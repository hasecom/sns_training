<?php
namespace App\Controllers;
class registController extends controller{
    //@初期表示
    public function index(){
        $model = null; 
        $this->View("regist",$model);
    }
}
?>