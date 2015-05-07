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
				$render["agentshopid"] = $retagentshop;
			} else {
				$render["error"] = "创建店铺失败!";
			}
			$this->ajaxReturn($render);
		
		} else {
			$render['stypedata'] = $this->getshoptype();
			$render['provicedata'] = $this->getregion(0,"1",0);
			// var_dump($render['provicedata']);
			$render['nextbtn'] = "createsub";
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
	public function shopinfo($shopid){
		// 创建店铺
		var_dump("shopinfo");
		
	}
}