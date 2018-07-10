<?php
/* Smarty version 3.1.30, created on 2018-04-12 11:45:54
  from "E:\phpStudy\WWW\phpstudy\pay\user\view\pay\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5acf46f2896f51_26496461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb2b805a8b0f1496c4179e5f288f0bb9ecabd0fc' => 
    array (
      0 => 'E:\\phpStudy\\WWW\\phpstudy\\pay\\user\\view\\pay\\index.html',
      1 => 1523520714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5acf46f2896f51_26496461 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>商品列表</title>
    <link rel="stylesheet" href="Public/bootstrap/dist/css/bootstrap.min.css">
    <style>
        /***/
        body{
            font-size: 18px;
        }
        li{
            list-style: none;
        }
        .price{
            color: red;
        }
        span{
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="main">
    <h3>商品列表</h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>商品名称</th>
            <th>商品价格</th>
            <th>商品描述</th>
            <th>剩余</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['goods_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['des'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</td>
            <td>
                <a href="?c=pay&a=order&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['Id'];?>
"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span>立即购买</button></a>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
</div>
</body>
<?php echo '<script'; ?>
 src="Public/js/common/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="Public/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</html><?php }
}
