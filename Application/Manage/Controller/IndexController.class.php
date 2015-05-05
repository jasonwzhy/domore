<?php
namespace Manage\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        
    }
    public function getregion($pid,$alevel){

    }
    public function getshoptype(){
    	$stype = M('shoptype');
    	$stypedata = $stype->select();
    	
    }
}