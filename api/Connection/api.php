<?php
namespace Api\Connection;
use Api\Connection\Connection;
class api{
  /*
  @A00001
  一致するユーザ数を返します。
  */
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

    /*
   @A00002
   ユーザを登録します。
  */
  public function A00002($param = null){
    $sql = null;
    $sql.= <<< EOM
INSERT INTO
    USERS
    (
      USER_ID,
      USER_NAME,
      PASSWORD
    ) 
    VALUES 
    (
      :USER_ID,
      :USER_NAME,
      :PASSWORD
    );
EOM;
    $connection =  new Connection();
    return $connection->con($sql,$param);
  }
}
