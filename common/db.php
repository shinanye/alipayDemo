<?php
/**
 * Created by PhpStorm.
 * User: pingping
 * Date: 2018/3/11
 * Time: 15:43
 */
class Db{
    private  $servername = "localhost";
    private $username = "root";
    private $password = "root";
//    private $dbname = "work2";
    private $dbname = "pay";
    public $conn;

    //单例 ：当前的类的实例化的对象有且只有一个
    private  static $instance;
    //创建一个获取$instance值的方法
    public  static function getInstance(){
        if(!self::$instance){
            self::$instance=new Db();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->conn();
    }

    //连接
    public  function  conn(){
        $params = array (
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'' ,   //设置字符集 保证中文不乱码
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,           //设置当前pdo的错误处理方式
        );
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password,$params);
//    echo "连接成功！";

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    //事务
    public function start(){
        $this->conn->beginTransaction();  //开始事务
    }
    public function end(){
        $this->conn->commit();  //结束事务
    }
    //增
    public  function  add($sql,$arr){
// 预处理语句操作数据库
        $pre=$this->conn->prepare($sql);
        $pre->execute($arr);
    }
    //删
    public  function del($sql){
        $pre=$this->conn->prepare($sql);
        $pre->execute();
    }
    //改
    public function modify($sql,$arr){
        if($arr==1){
            $pre=$this->conn->prepare($sql);
            $pre->execute();
        }else{
            $pre=$this->conn->prepare($sql);
            $pre->execute($arr);
        }

    }
    //查 fetchAll,fetch
    public function  select($sql,$type="fetchAll"){
        //prepare
        $pre=$this->conn->prepare($sql);
        //execute
        $pre->execute();
        if($type=="count"){
            $count=$pre->rowCount();
            return $count;
        }else{
            $result=$pre->$type(PDO::FETCH_ASSOC);
            return $result;
        }

    }
}