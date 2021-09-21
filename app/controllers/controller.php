<?php 
namespace App\Controllers;

class controller {
    public $META;
    public $MODEL;

    function __construct(){
        $this->META =[
        ];
    }

    function View($request,$model = null){
        $this->MODEL = $model;
        $model = null;
        include __DIR__.'/../../views/pages/'.$request.'.php';
   }

   function Json($data){
       echo json_encode($data);
    }
}
?>