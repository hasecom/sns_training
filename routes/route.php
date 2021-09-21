<?php
namespace Routes;
use App\Utill\network;
use App\Config\config;
use App\Auth\secure;
class route{
    private $requestUri;
    private $requestUriArr;
    private $requestPage;
    private $directoryArr;
    public $existsPage;
    function __construct(){
        $this->existsPage = false;
    }
    //リクエストされたURLの処理をします。
    public function getPath(){
        $this->requestUri = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL']:null;
        $this->requestUriArr = explode('/',$this->requestUri);
        if((new network())->isLocal()){
            //ローカル処理
            $this->directoryArr = explode('/',config::getEnv('SUB_DIRECTORY'));
        }else{
            $this->directoryArr = [];
        }

        //ドメイン、ディレクトリ調整
        $tempDirectory = "";
        $tempRequestUriArr = $this->requestUriArr;

        foreach($tempRequestUriArr as $key => $value){
            if(count($this->directoryArr) == count($tempRequestUriArr)){
               break;    
            }
            if($key == 0){
                $tempDirectory = array_pop($tempRequestUriArr);
            }else{
                $tempDirectory = array_pop($tempRequestUriArr)."/".$tempDirectory;
            }
        }
        if((new network())->isLocal()){
            //ローカル処理
            array_shift($this->requestUriArr);
            $this->requestPage = $tempDirectory;
        }else{
            //本番処理
            $this->requestPage = $tempDirectory;
        }
        return $this->requestPage;
    }

    //指定されたページに遷移します。
    public function call($req,$ctr){
        $secure = new secure;
        if($req == $this->getPath()){
            $this->existsPage = true;
            $ctr = explode("@",$ctr);
            $namespace =str_replace("-","\\","App-Controllers-");
            $class = $namespace.$ctr[0];
            $func = $ctr[1];
            return (new $class)->$func($secure->htmlEntity($_REQUEST));
        }else if($req == "*"){
            $this->existsPage = true;
            $ctr = explode("@",$ctr);
            $namespace =str_replace("-","\\","App-Controllers-");
            $class = $namespace.$ctr[0];
            $func = $ctr[1];
            return (new $class)->$func($secure->htmlEntity($_REQUEST));
        }
    }
}
?>