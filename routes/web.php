<?php
namespace Routes;
use Routes\route;

$router = new route();

//@ホーム画面
$router->call('home','homeController@index');//初期表示

if(!$router->existsPage){
  //$router->call('*','xxxxController@xxxx');
}