<?php
namespace App\Controllers;
class registController extends controller{
    //@初期表示
    public function index(){
        $model = null; 
        $this->View("regist",$model);
    }

    //会員登録
    public function registPost($request){
        $this->Json($request);
    }
}
?>