<?php
namespace Routes;
use Routes\route;

$router = new route();


//@ホーム画面
$router->call('home','homeController@index');//初期表示
$router->call('regist','registController@index');//初期表示
$router->call('post/regist','registController@registPost');//登録リクエスト
if(!$router->existsPage){
  //$router->call('*','xxxxController@xxxx');
}