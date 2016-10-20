<?php
//    phpinfo();

    require_once 'vendor/autoload.php';

    $smarty = new Smarty();
    $smarty->assign('to', 'world');
    echo $smarty->fetch('demo.tpl');
