<?php
/**
 * Created by PhpStorm.
 * User: sheng
 * Date: 2018/4/12
 * Time: 10:45
 */
class PayController{
    private $smarty;
    public function __construct()
    {
        $this->smarty=Mysmarty::getInstance();
    }
    //商品列表
    public function index(){
        if(isMobile){
            echo "移动端";
        }else{
            echo "PC端";
        }
        $data=getModel("pay")->index();
        $this->smarty->assign("arr",$data);
        $this->smarty->display("pay/index.html");
    }

    //订单
    public function order(){
        if(empty($_POST)){
            $data=getModel("pay")->order();
            $this->smarty->assign("ordernum",$data[1]);
            $this->smarty->assign("arr",$data[0]);
            if(isMobile){
                $this->smarty->display("pay/phoneorder.html");
            }else{
                $this->smarty->display("pay/order.html");
            }
        }else{
            if(isMobile){
                getModel("pay")->alipayphone();
            }else{
                getModel("pay")->alipaypc();
            }
        }

    }

    public function returnurl(){
        getModel("pay")->returnurl();
    }

}