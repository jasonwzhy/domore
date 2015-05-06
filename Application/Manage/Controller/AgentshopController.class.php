<?php
namespace Manage\Controller;
use Think\Controller;
class AgentshopController extends Controller {
	public function index(){
		$getregion = 
		$render['stypedata'] = $this->getshoptype();
		$render['provicedata'] = $this->getregion(0,"1",0);
		// var_dump($render['provicedata']);
		$this->assign($render);
		$this->display('Agentshop/base');
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
	public function createshop(){
		// 创建店铺
		/*
			场馆类型
			场馆名
			前台电话
			省份 城市 区域
			详细地址
			坐标
			创建人
		*/
		
	}
}