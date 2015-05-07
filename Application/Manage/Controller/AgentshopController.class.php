<?php
namespace Manage\Controller;
use Think\Controller;
class AgentshopController extends Controller {
	public function newshop(){
		if (IS_POST) {
			// 创建店铺
			/*
				场馆类型	场馆名  前台电话
				省份 城市 区域	详细地址
				坐标	创建人 创建时间
			*/
			$agentshopM = M('agentshop');
			$render["error"]="";
			$staffid = "1";//session 中 登录员工的id,调试赞用1
			$create_DT = date('Y-m-d H:i:s',time());
			$agentdata = array(
				"shoptype_id"	=>	$_POST["shoptypeid"],
				"shop_name"	=>	$_POST["shopname"],
				"shop_tel"	=>	$_POST["shoptel"],
				"province_id"	=>	$_POST["sproviceid"],
				"city_id"	=>	$_POST["scityid"],
				"area_id"	=>	$_POST["sareaid"],
				"address"	=>	$_POST["address"],
				"lon"	=>	$_POST["lng"],
				"lat"	=>	$_POST["lat"],
				"creator_id"	=>	$staffid,
				"checkstatus_id"	=>	1,
				"create_dt"	=>	$create_DT,
				"buessiness_status"	=>	1
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
		$shopid = $_SESSION['shopid'];
		if (IS_POST) {
			if ($_FILES != NULL) {
				$agentshopalbumsM = M('agentshopalbums');
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =     './Uploads/shops/'; // 设置附件上传根目录
				// $upload->savePath  =     $sid.'/';
				$upload->subName   =     $shopid;
				$info   =   $upload->uploadOne($_FILES['upimg']);
				if(!$info) {
					$this->error($upload->getError());
				}else{
					$imgpath = $upload->rootPath.$info["savepath"].$info["savename"];
					$imgpath = substr($imgpath,1);
					$albumsdata = array(
						"agentshop_id"	=>	$shopid,
						"img_path"	=>	$imgpath
					);
					$shopalbums = $agentshopalbumsM->add($albumsdata);
					$info['albumsid'] = $shopalbums;
					$info["imgpath"] = $imgpath;
					$this->ajaxReturn($info);
				}
			}elseif(isset($_POST) && NULL != $_POST) {

			}

		} else {
			$render["shopid"] = $_SESSION['shopid'];
			$this->assign($render);
			$this->display('Agentshop/newshopinfo');
		}
	}
	public function delshoppic(){
		
	}
}