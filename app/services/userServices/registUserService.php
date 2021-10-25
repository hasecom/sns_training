<?php
namespace App\Services\UserServices;
use App\Services\service;
use App\Auth\Hash;
use App\Models\InputModels\A00002InputModel;
use App\Constants\errorMessageConstant;

class registUserService extends service {

    protected $REQUEST_API_NAME;
    public function input($request = null){
      $this->REQUEST_API_NAME = "A00002";

      $digestPasswd = Hash::SetPass($request['USER_PASS']);

      $a00002 = new A00002InputModel(); 
      $a00002->USER_ID = $request['USER_ID'];
      $a00002->USER_NAME = $request['USER_NAME'];
      $a00002->PASSWORD = $digestPasswd;
      return $a00002;
    }

    public function output($result = null,$request = null){
      if($result){
        return $this->callRtnHandle($result);    
      }
      return $this->callRtnHandle($result,errorMessageConstant::INTERNAL_ERROR,0);  
    }
}
?>