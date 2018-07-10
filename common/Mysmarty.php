<?php
/**
 * Created by PhpStorm.
 * User: sheng
 * Date: 2018/3/11
 * Time: 10:55
 */

class Mysmarty extends Smarty{
    private static $instance;
    public static function getInstance(){
        if(!self::$instance){
            self::$instance=new Mysmarty();
        }
        return self::$instance;
    }
    public function __construct()
    {
        parent::__construct();
        $this->template_dir = ROOT_PATH.'/view/'; //模板目录
        $this->compile_dir = ROOT_PATH.'/runtime/tpl_c/'; //编译目录
        $this->cache_dir = ROOT_PATH.'/runtime/cache/'; //缓存目录
//        $this->config_dir=ROOT_PATH.'/configs/'; //配置文件目录
        $this->left_delimiter = '{'; //左定界符
        $this->right_delimiter = '}'; //右定界符

//        if(M=="index"){
//            $this->caching = true; //是否开启缓  默认为不开启
//        }else{
//            $this->caching = false;
//        }


        if(!is_dir($this->compile_dir)){
            mkdir($this->compile_dir);
        }
        if(!is_dir($this->cache_dir)){
            mkdir($this->cache_dir);
        }
    }
}