<?php
namespace App\Utill;
class formatRtnValue {
    //返す値,メッセージ,コード
    /*CODEはフロントで制御します。
    CODE:通常挙動=>1
    */
    public function returnHandle($obj,$msg,$code){
        return ["RESULT"=>$obj,"MESSAGE"=>$msg,"CODE"=>$code];
    }
}
?>