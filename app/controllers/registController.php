<?php
namespace App\Controllers;

use App\Services\UserServices\registUserService;
use App\Services\UserServices\userExistsService;

class registController extends controller{
    //@初期表示
    public function index(){
        $model = null; 
        $this->View("regist",$model);
    }

    //@会員登録
    public function registPost($request){
      $model = null;
      $userExistsService = new userExistsService;
      $userExistsObj = $userExistsService->request([
        'USER_ID'=>$request['userId'],
      ]);

      //ユーザIDが重複しない場合
      if($userExistsObj['CODE'] != 1){
        $model = $userExistsObj;
        $this->Json($model);
      }
      
      $registUserService = new registUserService;
      $registUserService->request([
        'USER_ID'=>$request['userId'],
        'USER_NAME'=>$request['userName'],
        'USER_PASS'=>$request['userPassWord'],
      ]);

      $this->Json($request);
    }
}
?>