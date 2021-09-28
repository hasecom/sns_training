<?php
namespace App\Services;

use API\Connection\api;
use App\Utill\formatRtnValue;

class service
{
  private $MODEL;

  public function request($request = null){
    $this->MODEL = $this->input($request);
    return $this->output($this->call(), $request);
  }

  public function addRequest($request = null, $inputValue = null){
    if ($request != null) {
      $this->MODEL = $request;
    } else {
      $this->MODEL = null;
    }
    return $this->call();
  }

  private function call(){
    $func = $this->REQUEST_API_NAME;
    return (new api)->$func($this->MODEL);
  }

  public function callRtnHandle($obj, $msg, $code){
    return (new formatRtnValue)->returnHandle($obj, $msg, $code);
  }
}
