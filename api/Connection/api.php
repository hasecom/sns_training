<?php
namespace Api\Connection;
use Api\Connection\Connection;
class api{
  public function A00001($param = null){
    $sql = null;
    $sql .= <<< EOM
SELECT
     COUNT(*) AS COUNT 
FROM 
    USERS USR
WHERE
    USR.USER_ID = :USER_ID;
EOM;
    $connection =  new Connection();
    return $connection->con($sql, $param);
  }
}
