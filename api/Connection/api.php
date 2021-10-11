<?php
namespace Api\Connection;
use Api\Connection\Connection;
class api{
  public function A00001($param = null){
    $sql = null;
    $sql .= <<< EOM
SELECT  * FROM USERS;
EOM;
    $connection =  new Connection();
    return $connection->con($sql, $param);
  }
}
