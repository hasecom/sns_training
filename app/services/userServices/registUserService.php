<?php
namespace App\Services\UserServices;
use App\Services\service;
use App\Models\InputModels\A00001InputModel;
use App\Models\OutputModels\A00001OutputModel;


class registUserService extends service {

    protected $REQUEST_API_NAME;
    public function input($request = null){
      echo "a";
      $this->REQUEST_API_NAME = "A00001";
      $a00001 = new A00001InputModel(); 
      //$a00001->USER_NAME = $request['USER_ID'];
      return null;
      //return $a00001;
    }

    public function output($result = null,$request = null){
      var_dump($result);
    }
}
?>