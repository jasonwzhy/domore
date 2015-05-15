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
			if (isset($_POST['shopagentid']) && $_POST['shopagentid'] != "") {
				$agentdata["agent_id"] = $_POST['shopagentid'];
			}		
			$retagentshop=$agentshopM->add($agentdata);
			if ($retagentshop) {
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
		// 创建店铺
		// 访问时shopid在否 未加入

		if (!isset($_SESSION["staffid"])) {
			$this->assign('waitSecond',0);
			$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
			$this->success('页面跳转中...');
			return ;
		}
		$shopid = $_SESSION['shopid'];
		$render['error'] = "";
		if (IS_POST) {
			if ($_FILES != NULL) {
				$agentshopalbumsM = M('agentshopalbums');
				// $this->ajaxReturn($_FILES["myupimg"]);
				// $upload = new \Think\Upload();// 实例化上传类
				// $upload->maxSize   =     6145728 ;// 设置附件上传大小
				// $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				// $upload->rootPath  =     './Uploads/shops/'; // 设置附件上传根目录
				// // $upload->savePath  =     $sid.'/';
				// $upload->subName   =     $shopid;
				// $info   =   $upload->uploadOne($_FILES['myupimg']);
				$rootpath = "./Uploads/shops/".$shopid."/";
				$fname = md5(uniqid(rand())).".jpg";
				$filenamepath = $rootpath.$fname;

				$saveret = move_uploaded_file($_FILES['myupimg']['tmp_name'],$filenamepath);
				if($saveret)
				{
					$filenamepath = substr($filenamepath,1);
					$albumsdata = array(
						"agentshop_id"	=>	$shopid,
						"img_path"	=>	$filenamepath
					);
					$shopalbums = $agentshopalbumsM->add($albumsdata);
					$render['albumsid'] = $shopalbums;
					$render["imgpath"] = $filenamepath;
					$this->ajaxReturn($render);
				} else {
					$render['error'] = "上传格式错误,请用jpg png jpeg等格式...";
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
				// $agentshopalbumsM = M('agentshopalbums');
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     6145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =     './Uploads/agents/'; // 设置附件上传根目录
				// $upload->savePath  =     $sid.'/';
				$upload->subName   =     "";
				$info   =   $upload->uploadOne($_FILES['agentimg']);
				if(!$info) {
					$this->error($upload->getError());
				}else{
					$imgpath = $upload->rootPath.$info["savepath"].$info["savename"];
					$imgpath = substr($imgpath,1);
					$info["imgpath"] = $imgpath;
					$this->ajaxReturn($info);
				}
			}
			elseif (isset($_POST) && NULL != $_POST) {
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
	public function signout(){
		unset($_SESSION['staffid']);
		$this->assign('waitSecond',0);
		$this->assign("jumpUrl",__ROOT__."/manage/agentshop/signin");
		$this->success('页面跳转中...');
	}
}