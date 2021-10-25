<?php
namespace App\Services\UserServices;
use App\Services\service;
use App\Models\InputModels\A00001InputModel;
use App\Models\OutputModels\A00001OutputModel;
use App\Constants\errorMessageConstant;

class userExistsService extends service {

    protected $REQUEST_API_NAME;
    public function input($request = null){
      $this->REQUEST_API_NAME = "A00001";
      $a00001 = new A00001InputModel(); 
      $a00001->USER_ID = $request['USER_ID'];
      return $a00001;
    }

    public function output($result = null,$request = null){
      $a00001OutputModel = new A00001OutputModel;
      $a00001OutputModel->COUNT = $result['0']['COUNT'];
      //リクエストされたユーザIDが重複しない場合
      if($a00001OutputModel->COUNT < 1){
        return $this->callRtnHandle($a00001OutputModel);  
      }
      return $this->callRtnHandle($a00001OutputModel,errorMessageConstant::ALREADY_EXISTS_USER_ID,0);
    }
}
?>