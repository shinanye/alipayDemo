<?php
/* Smarty version 3.1.30, created on 2018-04-13 07:21:26
  from "D:\wamp64\www\user\view\pay\order.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad05a7626fc71_82739017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3252f1b84aeb7ab685fd7f87f096ea0d14916c2b' => 
    array (
      0 => 'D:\\wamp64\\www\\user\\view\\pay\\order.html',
      1 => 1523533184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad05a7626fc71_82739017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>支付宝支付清单</title>
</head>

<style>
    html,body {
        width:100%;
        min-width:1200px;
        height:auto;
        padding:0;
        margin:0;
        font-family:"微软雅黑";
        background-color:#242736
    }
    .header {
        width:100%;
        margin:0 auto;
        height: 90px;
        background-color:#fff
    }
    .container {
        width:100%;
        min-width:100px;
        height:auto
    }
    .black {
        background-color:#242736
    }
    .blue {
        background-color:#0ae
    }
    .qrcode {
        width:1200px;
        margin:0 auto;
        height:30px;
        background-color:#242736
    }
    .littlecode {
        width:16px;
        height:16px;
        margin-top:6px;
        cursor:pointer;
        float:right
    }
    .showqrs {
        top:30px;
        position:absolute;
        width:100px;
        margin-left:-65px;
        height:160px;
        display:none
    }
    .shtoparrow {
        width:0;
        height:0;
        margin-left:65px;
        border-left:8px solid transparent;
        border-right:8px solid transparent;
        border-bottom:8px solid #e7e8eb;
        margin-bottom:0;
        font-size:0;
        line-height:0
    }
    .guanzhuqr {
        text-align:center;
        background-color:#e7e8eb;
        border:1px solid #e7e8eb
    }
    .guanzhuqr img {
        margin-top:10px;
        width:80px
    }
    .shmsg {
        margin-left:10px;
        width:80px;
        height:16px;
        line-height:16px;
        font-size:12px;
        color:#242323;
        text-align:center
    }
    .nav {
        width:1200px;
        margin:0 auto;
        height:70px;
    }
    .open,.logo {
        display:block;
        float:left;
        height:40px;
        width:85px;
        margin-top:20px
    }
    .divier {
        display:block;
        float:left;
        margin-left:20px;
        margin-right:20px;
        margin-top:23px;
        width:1px;
        height:24px;
        background-color:#d3d3d3
    }
    .open {
        line-height:30px;
        font-size:20px;
        text-decoration:none;
        color:#1a1a1a
    }
    .navbar {
        float:right;
        width:200px;
        height:40px;
        margin-top:15px;
        list-style:none
    }
    .navbar li {
        float:left;
        width:100px;
        height:40px
    }
    .navbar li a {
        display:inline-block;
        width:100px;
        height:40px;
        line-height:40px;
        font-size:16px;
        color:#1a1a1a;
        text-decoration:none;
        text-align:center
    }
    .navbar li a:hover {
        color:#00AAEE
    }
    .title {
        width:1200px;
        margin:0 auto;
        height:80px;
        line-height:80px;
        font-size:20px;
        color:#FFF
    }
    .content {
        width:100%;
        min-width:1200px;
        height:660px;
        background-color:#fff;
    }
    .alipayform {
        width:800px;
        margin:0 auto;
        height:600px;
        border:1px solid #0ae
    }
    .element {
        width:600px;
        height:80px;
        margin-left:100px;
        font-size:20px
    }
    .etitle,.einput {
        float:left;
        height:26px
    }
    .etitle {
        width:150px;
        line-height:26px;
        text-align:right
    }
    .einput {
        width:200px;
        margin-left:20px
    }
    .einput input {
        width:398px;
        height:24px;
        border:1px solid #0ae;
        font-size:16px
    }
    .mark {
        margin-top: 10px;
        width:500px;
        height:30px;
        margin-left:80px;
        line-height:30px;
        font-size:12px;
        color:#999
    }
    .legend {
        margin-left:100px;
        font-size:24px
    }
    .alisubmit {
        width:400px;
        height:40px;
        border:0;
        background-color:#0ae;
        font-size:16px;
        color:#FFF;
        cursor:pointer;
        margin-left:170px
    }
    .footer {
        width:100%;
        height:120px;
        background-color:#242735
    }
    .footer-sub a,span {
        color:#808080;
        font-size:12px;
        text-decoration:none
    }
    .footer-sub a:hover {
        color:#00aeee
    }
    .footer-sub span {
        margin:0 3px
    }
    .footer-sub {
        padding-top:40px;
        height:20px;
        width:600px;
        margin:0 auto;
        text-align:center
    }
</style>
<body>
<div class="header">
    <div class="container blue">
        <div class="title">支付宝即时支付</div>
    </div>
</div>
<div class="content">
    <form action="" class="alipayform" method="post" target="_blank">
        <div class="element" style="margin-top:60px;">
            <div class="legend">支付宝快速支付 </div>
        </div>
        <div class="element">
            <div class="etitle">商户订单号:</div>
            <div class="einput"><input type="text" name="WIDout_trade_no" id="out_trade_no" value="<?php echo $_smarty_tpl->tpl_vars['ordernum']->value;?>
"></div>
        </div>

        <div class="element">
            <div class="etitle">商品名称:</div>
            <div class="einput"><input type="text" name="WIDsubject" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value['goods_name'];?>
"></div>
        </div>
        <div class="element">
            <div class="etitle">付款金额:</div>
            <div class="einput"><input type="text" name="WIDtotal_fee" value="0.01"></div>
        </div>
        <div class="element">
            <div class="etitle">商品描述:</div>
            <div class="einput"><input type="text" name="WIDbody" value="<?php echo $_smarty_tpl->tpl_vars['arr']->value['des'];?>
"></div>
        </div>
        <div class="element">
            <input type="submit" class="alisubmit" value ="确认支付">
        </div>
    </form>
</div>
<div class="footer">
    <p class="footer-sub">
        <a href="http://ab.alipay.com/i/index.htm" target="_blank">关于支付宝</a><span>|</span>
        <a href="https://e.alipay.com/index.htm" target="_blank">商家中心</a><span>|</span>
        <a href="https://job.alibaba.com/zhaopin/index.htm" target="_blank">诚征英才</a><span>|</span>
        <a href="http://ab.alipay.com/i/lianxi.htm" target="_blank">联系我们</a><span>|</span>
        <a href="#" id="international" target="_blank">International&nbsp;Business</a><span>|</span>
        <a href="http://ab.alipay.com/i/jieshao.htm#en" target="_blank">About Alipay</a>
        <br>
        <span>支付宝版权所有</span>
        <span class="footer-date">2004-2016</span>
        <span><a href="http://fun.alipay.com/certificate/jyxkz.htm" target="_blank">ICP证：沪B2-20150087</a></span>
    </p>


</div>
</body>
<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
>

</html><?php }
}
