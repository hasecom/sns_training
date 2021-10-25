<?php 
namespace App\Auth;

class Hash{
    public static function SetPass($val){
        return password_hash($val,PASSWORD_DEFAULT);
    }
    public static function ExistPass($inputpass,$digestPass){
        return password_verify($inputpass,$digestPass);
    }
}
?>