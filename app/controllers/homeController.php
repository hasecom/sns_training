<?php
namespace App\Controllers;
class homeController extends controller{
    //@初期表示
    public function index(){
        $model = null; 
        $this->View("home",$model);
    }
}
?>