<?php
namespace Manage\Controller;
use Think\Controller;
class AgentshopController extends Controller {
	public function index(){
		if (isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/newshop");
			$this->success('页面跳转中...');
			return ;
		}else{
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		
	}
	public function signin(){
		if (IS_POST) {
			$render["error"]="";
			$domorestaffM = M("domorestaff");
			$staffcondition = array(
				"login_name" => $_POST["mobileno"],
				"passwd" => $_POST["passwd"]
			);
			$staffdata = $domorestaffM->where($staffcondition)->find();
			if ($staffdata) {
				$_SESSION['staffid'] = $staffdata["domorestaff_id"];
			} else {
				$render["error"]="用户名 或 密码错误!";
			}
			$this->ajaxReturn($render);
			
		} else {
			$this->display('Agentshop/signin');
		}
		
	}
	public function newshop(){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		if (IS_POST) {
			// 创建店铺
			/*
				场馆类型	场馆名  前台电话
				省份 城市 区域	详细地址
				坐标	创建人 创建时间
			*/
			$agentshopM = M('agentshop');
			$render['error']="";
			$region = M('Region');
			$staffid = $_SESSION['staffid'];//session 中 登录员工的id,调试赞用1
			$create_DT = date('Y-m-d H:i:s',time());
			$agentdata = array(
				"shoptype_id"	=>	$_POST["shoptypeid"],
				"shop_name"	=>	$_POST["shopname"],
				"shop_tel"	=>	$_POST["shoptel"],
				"shop_tel2"	=>	$_POST["shoptel2"],
				"province_id"	=>	$_POST["sproviceid"],
				"city_id"	=>	$_POST["scityid"],
				"area_id"	=>	$_POST["sareaid"],
				"address"	=>	$_POST["address"],
				"lon"	=>	$_POST["lng"],
				"lat"	=>	$_POST["lat"],
				"creator_id"	=>	$staffid,
				"domore_manager_id" => $staffid,
				"checkstatus_id"	=>	1,
				"create_dt"	=>	$create_DT,
				"buessiness_status"	=>	1,
				"start_time" => $_POST["starttime"],
				"end_time" => $_POST["endtime"],
				"is_appointment"	=>	$_POST["isappointment"],
				"appointment_time"	=>	$_POST["appointmenttime"]
			);
			$zonecode = $region->where("region_id=".$_POST["scityid"])->find();
			$zonecode = substr($zonecode["telcode"], 1);
			$sncountc = array(
					"city_id" => $_POST["scityid"],
					"shoptype_id" => $_POST["shoptypeid"]
				);
			$acount = $agentshopM->where($sncountc)->count();
			$acount = $acount+1+60;
			$sncode = "P".$zonecode."-".sprintf("%02d",$_POST["shoptypeid"]).sprintf("%03d",$acount);
			if (isset($_POST['shopagentid']) && $_POST['shopagentid'] != "") {
				$agentdata["agent_id"] = $_POST['shopagentid'];//联盟商户member
				$agentdata["shop_sn"] = "D".$sncode;
			}
			else{//非联盟nomember
				$agentdata["shop_sn"] = $sncode;
			}
			$retagentshop=$agentshopM->add($agentdata);
			if ($retagentshop) {
				//同时添加shopprice空记录
				$shoppriceM = M("agentshopprice");
				$agentshoppriceD = array(
					"agentshop_id" =>	$retagentshop,
					"market_domore_price" => 0,
					"market_domore_contract_price" => 0,
					"isonsale" => 0
				);
				$retagentshopprice = $shoppriceM->add($agentshoppriceD);

				$_SESSION['shopid'] = $retagentshop;
				$render["agentshopid"] = $retagentshop;
				$agentdir = "./Uploads/shops/".$retagentshop;
				mkdir($agentdir);
			} else {
				$render["error"] = "创建店铺失败!";
			}
			$this->ajaxReturn($render);
		
		} else {
			$agentM = M('agent');
			$render['stypedata'] = $this->getshoptype();
			$render['provicedata'] = $this->getregion(0,"1",0);
			$render['agentlist'] = $agentM->select();
			$this->assign($render);
			$this->display('Agentshop/newshop');
		}
	}
	public function getregion($pzcode,$alevel,$isajax=1){
		$region = M('Region');
		$condition['parent_zipcode'] = $pzcode;
		$condition['area_level'] = $alevel;
		$regiondata = $region->where($condition)->select();
		if ($isajax==0) {
			return $regiondata;
		}else{
			$this->ajaxReturn($regiondata);
		}
		
    }
	public function getshoptype(){
		$stype = M('shoptype');
		$stypedata = $stype->select();
		return $stypedata;
	}
	public function shopinfo(){
		// 创建场馆 完善场馆信息
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		//添加判断session['shopid']正常
		#code...
		#{
		#
		#}
		$shopid = $_SESSION['shopid'];

		$render['error'] = "";
		if (IS_POST) {
			if ($_FILES != NULL) {
				$agentshopalbumsM = M('agentshopalbums');

				import("Manage.Util.upyun");
				//图片上传至upyun
				$upyun = new \UpYun('domoreimages', 'domore', 'domore123456');
				$fname = md5(uniqid(rand())).".jpg";
				try {
					$upyun_rootpath = "/domoreimg/shops/".$shopid."/";
					$domain = "images.lifecare.cc";
					$upyun_filenamepath = $domain.$upyun_rootpath.$fname;
					$fh = fopen($_FILES['myupimg']['tmp_name'],'rb');
					// $opts = array(
					// 	\UpYun::X_GMKERL_TYPE => 'fix_both',
					// 	\UpYun::X_GMKERL_VALUE => '300x200'
					// );
					$rsp = $upyun->writeFile($upyun_rootpath.$fname, $fh, True);   // 上传图片，自动创建目录
					fclose($fh);
					$render['imgpath'] = $upyun_filenamepath;
				} catch (Exception $e) {
					$render['imgpath'] = "";
					$e->getCode();
					$render['error'] = "上传错误".$e->getMessage();
					$this->ajaxReturn($render);
				}
				//本地备份图片
				$localbak_rootpath = "./Uploads/shops/".$shopid."/";
				$localbak_filenamepath = $localbak_rootpath.$fname;

				$saveret = move_uploaded_file($_FILES['myupimg']['tmp_name'],$localbak_filenamepath);
				if(!$saveret)
				{
					$localbak_filenamepath = "";
				}

				$localbak_filenamepath = substr($localbak_filenamepath,1);
				$albumsdata = array(
					"agentshop_id"	=>	$shopid,
					"img_path"	=>	$upyun_filenamepath,
					"localbak_imgpath" => $localbak_filenamepath
				);
				$shopalbums = $agentshopalbumsM->add($albumsdata);
				if ($shopalbums) {
					$render['albumsid'] = $shopalbums;
					$this->ajaxReturn($render);
				} else {
					$render['error'] = "上传错误";
					$this->ajaxReturn($render);	
				}				

			}elseif(isset($_POST) && NULL != $_POST) {
				$agentshopM = M('agentshop');
				$condition["agentshop_id"] = $shopid;
				$shopinfodata = array(
					"shop_desc"	=>	$_POST["shopdesc"],
					"shop_manager" => $_POST["shopmanager"],
					"shop_manager_tel" => $_POST["shopmanagertel"],
					"shop_manager_email" => $_POST["shopmanageremail"]
				);
				$agentshopinforet =$agentshopM->where($condition)->save($shopinfodata);
				if (!$agentshopinforet) {
					$render['error'] = "提交失败";
                }
                $this->ajaxReturn($render);
			}

		} else {
			$render["shopid"] = $_SESSION['shopid'];
			$this->assign($render);
			$this->display('Agentshop/newshopinfo');
		}
	}
	public function delshoppic(){
		$agentshopalbumsM = M('agentshopalbums');
		$render['error'] = "";
		if(IS_POST && isset($_POST['albumsid']) && $_POST['albumsid'] != NULL){
			$condition["agentshopalbums_id"] = $_POST['albumsid'];
			$shopalbumsdata = $agentshopalbumsM->where($condition)->find();
			if ($shopalbumsdata) {
				unlink(".".$shopalbumsdata["img_path"]);
				$agentshopalbumsM->where($condition)->delete();
				$render['shopalbumsdata'] = $shopalbumsdata;
				$this->ajaxReturn($render);
			} else {
				$render['error'] = "删除错误";
				$this->ajaxReturn($render);
			}
		}
	}
	public function newagent(){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$staffid = $_SESSION["staffid"];//session 中 登录员工的id,调试赞用1
		$create_DT = date('Y-m-d H:i:s',time());
		if (IS_POST) {
			if ($_FILES != NULL) {
				$render = array();

				import("Manage.Util.upyun");
				$upyun = new \UpYun('domoreimages', 'domore', 'domore123456');
				$fname = md5(uniqid(rand())).".jpg";				
				try {
					//upyun img path
					$upyun_rootpath = "/domoreimg/agents/";
					$domain = "images.lifecare.cc";
					$upyun_filenamepath = $domain.$upyun_rootpath.$fname;
					$fh = fopen($_FILES['myupimg']['tmp_name'],'rb');
					$rsp = $upyun->writeFile($upyun_rootpath.$fname, $fh, True);// 上传图片，自动创建目录
					fclose($fh);
					$render['imgpath'] = $upyun_filenamepath;
				} catch (Exception $e) {
					$render['imgpath'] = "";
					$e->getCode();
					$render['error'] = "上传错误".$e->getMessage();
					$this->error($render,true);
					return ;
				}

				$local_rootpath = "./Uploads/agents/";
				$local_filenamepath = $local_rootpath.$fname;
				$saveret = move_uploaded_file($_FILES['myupimg']['tmp_name'],$local_filenamepath);
				if($saveret)
				{
					$local_filenamepath = substr($local_filenamepath,1);
					$render["bakimgpath"] = $local_filenamepath;
				}else{
					$render["bakimgpath"] = "";
				}
				$this->ajaxReturn($render);
			}
			elseif (isset($_POST) && NULL != $_POST) {
				$agentshopM = M('agentshop');
				$agentM = M("agent");
				$render["error"]="";
				$passwd = rand(10000,99999);
				$agentdata = array(
					"province_id" => $_POST["sprovice"],
					"city_id" => $_POST["scity"],
					"area_id" => $_POST["sarea"],
					"agent_address" => $_POST["address"],
					"agent_name" => $_POST["agentname"],
					"reg_no" => $_POST["regno"],
					"license_img" => $_POST["agentimgpath"],
					"license_img_localbak" => $_POST["agentimgpathbak"],
					"agent_manager" => $_POST["manager"],
					"agent_manager_tel" => $_POST["managertel"],
					"moblie_no" => $_POST["managertel"],
					"agent_manager_email" => $_POST["manageremail"],
					"creator_id" => $staffid,
					"domore_manager_id" => $staffid,
					"business_status" => 1,
					"checkstatus_id" => 1,
					"create_dt" => $create_DT,
					"passwd"	=>	$passwd
					// "first_account"=>""
				);
				$regionM = M('Region');

				$zonecode = $regionM->where("region_id=".$_POST["scity"])->find();
				$zonecode = substr($zonecode["telcode"],1);

				$sncountc = array("city_id" => $_POST["scity"]);
				$acount = $agentM->where($sncountc)->count();
				$acount = $acount+1+60;
				$sncode = "B".$zonecode."-".sprintf("%05d",$acount);
				$agentdata["agent_sn"] = $sncode;
				$retagent=$agentM->add($agentdata);
				if ($retagent) {
					if ($_POST["accountself"] == 1) {
						$accountmanager = $_POST["manager"];
						$accountmanagertel = $_POST["managertel"];
						$accountmanageremail = $_POST["manageremail"];
					} else {
						$accountmanager = $_POST["accountmanager"];
						$accountmanagertel = $_POST["accountmanager"];
						$accountmanageremail = $_POST["accountmanageremail"];
					}
					$agentaccountM = M('agentaccount');
					$agentaccountdata = array(
						"agent_id" => $retagent,
						"agent_accounting" => $accountmanager,
						"agent_accounting_tel" => $accountmanagertel,
						"agent_accounting_email" => $accountmanageremail,
						"company_account_name" => $_POST["compyaccountname"],
						"company_account_no" => $_POST["compyaccountno"],
						"company_account_bank" => $_POST["compyaccountbank"],
						"personal_account_name" => $_POST["peraccountname"],
						"personal_account_no" => $_POST["peraccountno"],
						"personal_account_bank" => $_POST["peraccountbank"],
						"alipay_account_name" => $_POST["alipayname"],
						"alipay_account" => $_POST["alipayno"],
						"wxpayment_account_name" => $_POST["wxpayname"],
						"wxpayment_account" => $_POST["wxpayno"]
					);
					$retagentaccount=$agentaccountM->add($agentaccountdata);
					if ($retagentaccount) {
						$this->ajaxReturn($render);
					}
				}
				else
				{
					//创建agenterror
				}
			}
		}
		else{
			$render['provicedata'] = $this->getregion(0,"1",0);
			$this->assign($render);
			$this->display('Agentshop/newagent');	
		}
	}
	public function myshop(){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$myshopM = M("agentshop");
		$render["memberlst"] = array();
		$render["nomemberlst"] = array();
		$condition = array(
			"creator_id" => $_SESSION["staffid"]
		);
		$myshopLst = $myshopM->where($condition)->select();
		foreach ($myshopLst as $shopitem) {
			if ($shopitem["agent_id"] != NULL) {
				$render["memberlst"][] = $shopitem;
			}else{
				$render["nomemberlst"][] = $shopitem;
			}
		}
		$this->assign($render);
		$this->display('Agentshop/myshop');
	}
	public function shopdetail($sid){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$myshopM = M("agentshop");
		$shoppriceM = M("agentshopprice");
		
		$agentshopID["agentshop_id"] = $sid;

		$shopdetaildata = $myshopM->where($agentshopID)->find();
		if ($shopdetaildata) {
			$shoppricedetaildata = $shoppriceM->where($agentshopID)->find();
			$render["shopprice"] = $shoppricedetaildata;
			$render["shopdetail"] = $shopdetaildata;
			$this->assign($render);
			$this->display('Agentshop/myshopdetail');
		} else {
			//没有agentshop_id时返回界面;
		}
	}
	public function updateshopprice()
	{
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->error('非法操作');
			return ;
		}
		if (IS_POST) {
			$render['error']="";
			$shoppriceM = M("agentshopprice");

			$agentshopid["agentshop_id"] = $_POST["agentshopid"];

			$uppricedata = array(
				"market_price" => $_POST["marketprice"],
				"market_domore_price" => $_POST["domoreprice"],
				"market_domore_contract_price" => $_POST["domorecontractprice"],
				"idle_domore_price" => $_POST["idledomoreprice"],
				"idle_contract_price" => $_POST["idlecontractprice"],
				"time_limit" => $_POST["timelimit"]
			);
			$retupprice = $shoppriceM->where($agentshopid)->save($uppricedata);
			if (!$retupprice) {
				$render['error']="提交失败";
			}
			$this->ajaxReturn($render);
		} else {
			# code...
		}
		
	}
	public function myagent(){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$myagentM = M("agent");
		$shopM = M("agentshop");
		$render["error"] = "";
		$condition = array(
			"creator_id" => $_SESSION["staffid"]
		);
		$myagentLst = $myagentM->where($condition)->select();
		if ($myagentLst) {
			foreach ($myagentLst as $key => $value) {
				$agentid["agent_id"] = $value["agent_id"];
				$agentshopcount = $shopM->where($agentid)->count();
				$myagentLst[$key]["agentcount"] = $agentshopcount;
			}
		} else {
			$myagentLst = array();
		}

		$render["myagentlst"] = $myagentLst;
		$this->assign($render);
		$this->display('Agentshop/myagent');
	}
	public function agentdetail($aid)
	{
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$myagentM = M("agent");
		$shopM = M("agentshop");
		$agentID["agent_id"] = $aid;
		$render = array();
		$agentdetaildata = $myagentM->where($agentID)->find();
		if ($agentdetaildata) {
			$agentshopcount = $shopM->where($agentID)->count();
			$agetnshopLst = $shopM->where($agentID)->select();
			$render["agentdetail"] = $agentdetaildata;
			$render["agentshopcount"] = $agentshopcount;
			$render["agetnshoplst"] = $agetnshopLst;
			$this->assign($render);
			$this->display('Agentshop/myagentdetail');
			return ;
		} else {
			//没有agentid时返回界面;
		}
	}
	public function mkrelation($aid){
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$myagentM = M("agent");
		$shopM = M("agentshop");
		$agentID["agent_id"] = $aid;
		$noagentID["agent_id"] = array("EXP","IS NULL");
		$render = array();
		//应当添加检测agentid是否存在
		$membershopLst = $shopM->where($agentID)->select();
		$nomembershopLst = $shopM->where($noagentID)->select();
		$render["membershoplst"] = $membershopLst;
		$render["nomembershoplst"] = $nomembershopLst;
		$render["agentid"] = $aid;
		$this->assign($render);
		$this->display('Agentshop/mkagentrelation');
	}
	public function agentaddshop()
	{
		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$agentM = M("agent");
		$shopM = M("agentshop");
		$render["error"] = "";
		if (IS_POST) {
			$agentiddata['agent_id'] = $_POST["agentid"];
			foreach ($_POST["ids"] as $shopid) {
				$shopdata = $shopM->where("agentshop_id=".$shopid)->find();
				$agentiddata["shop_sn"] = "D".$shopdata["shop_sn"];
				$condition["agentshop_id"] = $shopid;
				$shopM->where($condition)->save($agentiddata);
			}
			$this->ajaxReturn($render);
			return ; 
		} else {
			$render["error"] = "error";
			$this->ajaxReturn($render);
			return ;
			# code...
		}
		
	}
	public function shopclass(){
		$this->display('Agentshop/shopclass');
	}
	public function upyuntest()
	{
		// require_once('upyun.class.php');
		// require_once('upyun.class.php');
		if (IS_POST) {
			if ($_FILES != NULL) {
				import("Manage.Util.upyun");
				$upyun = new \UpYun('domoreimages', 'domore', 'domore123456');
				// $fh = fopen('./Uploads/123.jpg', 'rb');
				$fh = fopen($_FILES['myupimg']['tmp_name'],'rb');
				$opts = array(
					\UpYun::X_GMKERL_TYPE => 'fix_both',
					\UpYun::X_GMKERL_VALUE => '300x200'
				);
				$rsp = $upyun->writeFile('/demo/1.png', $fh, True, $opts);   // 上传图片，自动创建目录
				fclose($fh);
				$this->ajaxReturn($rsp);
			} else {
				# code...
			}
			
			# code...
		} else {
			# code...
			$this->display('Agentshop/upyum');
		}
		
	}
	public function signout(){
		unset($_SESSION['staffid']);
		$this->assign('waitSecond',0);
		$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
		$this->success('页面跳转中...');
	}
}