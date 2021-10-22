<?php 
namespace Api\Connection;
use App\Config\config;
use \PDO;
use \PDOException;

class Connection{
    private static $dbh;
    public static function pdo(){
        $dsn = 'mysql:dbname='.Config::getEnv('DB_NAME').';host='.Config::getEnv('DB_HOST');
        $user = Config::getEnv('DB_USER');
        $password = Config::getEnv('DB_PASSWORD');
        self::$dbh = new PDO($dsn, $user, $password);
    }
    public function con($sql,$param = null){
        self::pdo();
        try {
            $sth = self::$dbh->prepare("$sql");
            if($param != null){
                  foreach($param as $key => $val){   
                    if((preg_match("/_WILDCARD$/",$key) == 1) && $val != null){
                        $k = explode("_",$key)[0];
                        $sth->bindValue(':'.$k,$val, PDO::PARAM_STR);
                    }else if(($key == 'ROW_NUM' || $key == 'FROM_NUM' ) && $val != null){
                        $sth->bindValue( ':'.$key, (int)$val, PDO::PARAM_INT );
                    } else if($val != null){
                        $sth->bindValue(':'.$key,$val);
                    }else{
                        $sth->bindValue(':'.$key, null, PDO::PARAM_NULL);
                    }
                }
            }
            $flag = $sth->execute();
            if(trim((mb_strstr( $sql,' ', true)),"\n") != 'SELECT'){
                $result = $flag;
            }else{
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            }
            return $result;
        } catch(PDOException $e){
            exit;
        }
    }
}
?>