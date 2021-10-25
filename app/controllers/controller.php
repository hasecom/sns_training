<?php 
namespace App\Controllers;

class controller {
    public $META;
    public $MODEL;

    function __construct(){
        $this->META =[
        ];
    }

    protected function View($request,$model = null){
        $this->MODEL = $model;
        $model = null;
        include __DIR__.'/../../views/pages/'.$request.'.php';
   }

   protected function Json($data){
       echo json_encode($data);
       die;
    }
}
?>