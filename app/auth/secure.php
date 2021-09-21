<?php
namespace App\Auth;
class secure {
  public function htmlEntity($ary){
    if(count($ary) <= 0){
      return;
    }
    $rtnAry = $this->htmlEntity_helper($ary);
    return $rtnAry;
  }
  private function htmlEntity_helper($ary){
    foreach($ary as $key => $value) {
        if (is_array($value)){
            $ary[$key] = $this->htmlEntity_helper($value);
        } else {
            $ary[$key] = htmlspecialchars($value,ENT_QUOTES);
        }
    }
    return $ary;
  }
}
