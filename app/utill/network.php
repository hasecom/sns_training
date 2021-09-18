<?php 
namespace App\Utill;
class network {
    public function isLocal(){
        return $_SERVER['HTTP_HOST'] == 'localhost' || '127.0.0.1';
    }
}
?>