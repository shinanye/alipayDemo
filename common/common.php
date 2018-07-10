<?php
//index.php?c=pay&a=index  项目执行路径
// c ----控制器
// a-----控制层中的方法名
function getController()
{
    if (empty($_GET)) {
       header("Location:?c=user&a=index");
    } else {
        $c = $_GET["c"];
        $a = $_GET["a"];
        $c = ucfirst($c) . "Controller";
        $Path = "controller/$c.php";
        require $Path;
        $user = new $c();
        $user->$a();
    }
}

    function getModel($model)
    {
        $m = ucfirst($model) . "Model";
        $modelPath ="model/$m.php";
        require_once $modelPath;
        return new $m();
    }


