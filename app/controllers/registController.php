<?php
namespace App\Controllers;

use App\Services\UserServices\registUserService;
class registController extends controller{
    //@初期表示
    public function index(){
        $model = null; 
        $this->View("regist",$model);
    }

    //@会員登録
    public function registPost($request){

      $registUserService = new registUserService;
      $registUserService->request([
        'USER_ID'=>$request['userId']
      ]);

      $this->Json($request);
    }
}
?>