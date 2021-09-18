<?php
namespace App\Kernel;

class kernel{
    function __construct(){
        require(__DIR__."/../../Routes/web.php");
    }
}
?>