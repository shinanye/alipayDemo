<?php

/**
 * Created by PhpStorm.
 * User: sheng
 * Date: 2018/4/12
 * Time: 10:46
 */
class PayModel
{
    private $db;
    public function __construct()
    {
        $this->db=Db::getInstance();
    }

    //商品列表
    public function index(){
        $sql="SELECT * FROM shoplist";
        $res=$this->db->select($sql);
        return $res;
    }

    public function order(){
        $id=$_GET["id"];
        $ordernum=time();  //订单号
        $sql="SELECT * FROM shoplist WHERE Id=$id";
        $res=$this->db->select($sql,"fetch");
        //写入订单表
        $sql1="INSERT INTO orderlist(order_num,goods_id,state) VALUES (?,?,?)";
        $arr1=[$ordernum,$res['Id'],0];
        $this->db->add($sql1,$arr1);
        $rearr=[$res,$ordernum];
        return $rearr;
    }

    public function alipaypc(){
        global $alipay_config;
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $_POST['WIDout_trade_no'];
        //订单名称，必填
        $subject = $_POST['WIDsubject'];
        //付款金额，必填
        $total_fee = $_POST['WIDtotal_fee'];
        //商品描述，可空
        $body = $_POST['WIDbody'];

        /************************************************************/

//构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],

            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"
        );
//建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;

    }
    public function alipayphone(){
        global $alipay_config;
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $_POST['WIDout_trade_no'];
        //订单名称，必填
        $subject = $_POST['WIDsubject'];
        //付款金额，必填
        $total_fee = $_POST['WIDtotal_fee'];
        //收银台页面上，商品展示的超链接，必填
        $show_url = $_POST['WIDshow_url'];
        //商品描述，可空
        $body = $_POST['WIDbody'];
//构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "show_url"	=> $show_url,
            //"app_pay"	=> "Y",//启用此参数能唤起钱包APP支付宝
            "body"	=> $body,
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1
            //如"参数名"	=> "参数值"   注：上一个参数末尾需要“,”逗号。

        );

//建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }
    public function returnurl(){
        //商户订单号

        $out_trade_no = $_GET['out_trade_no'];
        echo "验证成功<br />";
        $this->db->start();
        $sql="UPDATE orderlist SET state=? WHERE order_num=$out_trade_no";
        $arr=[1];
        $this->db->modify($sql,$arr);

        $sql="UPDATE shoplist SET count=count-1 WHERE Id=(SELECT goods_id FROM orderlist WHERE order_num=$out_trade_no)";
        $this->db->modify($sql,1);
        $this->db->end();
        if(isMobile){
            header("Location:http://192.168.1.171/phpstudy/pay/user/index.php?c=pay&a=index");
        }else{
            header("Location:index.php?c=pay&a=index");
        }

    }

    public function phoneorder(){
        $id=$_GET["id"];
        $ordernum=time();  //订单号
        $sql="SELECT * FROM shoplist WHERE Id=$id";
        $res=$this->db->select($sql,"fetch");
        //写入订单表
        $sql1="INSERT INTO orderlist(order_num,goods_id,state) VALUES (?,?,?)";
        $arr1=[$ordernum,$res['Id'],0];
        $this->db->add($sql1,$arr1);
        $rearr=[$res,$ordernum];
        return $rearr;
    }
}