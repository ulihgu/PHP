<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE); 
    //include "../../php/sqlConfig.php";

    $buyAmount = $_POST['buyAmount'];//数量
    $dealPrice = $_POST['dealPrice'];//成交价格
    $index_xt = $_POST['index_xt'];//形态
    $index_zb = $_POST['index_zb'];//指标
    $positives = $_POST['positives'];
    $priceLoss = $_POST['priceLoss'];
    $shrinkage = $_POST['shrinkage'];
    $smallK = $_POST['smallK'];
    $stockCode = $_POST['stockCode'];
    $stockName = $_POST['stockName'];
    $upward = $_POST['upward'];

    $time = time();

    $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
    $mysql_username = 'root';
    $mysql_password = 'ulihgu21';
    $mysql_database = 'mysqldatabase';
    $dsn = 'mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
    $sqlConnect = new PDO($dsn, $mysql_username, $mysql_password);

    $sql = "insert into shares_stock(index_zb,index_xt,shares_amount,shares_price,positives,priceLoss,shrinkage,smallK,shares_code,shares_name,upward,time) 
    values('{$index_zb}','{$index_xt}','{$buyAmount}','{$dealPrice}','{$positives}','{$priceLoss}','{$shrinkage}','{$smallK}','{$stockCode}','{$stockName}','{$upward}',{$time})";
    $query = $sqlConnect->prepare($sql);    
    
    $arrs = array();
    if($query->execute()){
        $arrs = array('error' =>'正常:没有问题！','state'=>'OK');
    }else{
        $arrs = array('error' => '错误:写入数据库失败！', 'state' => 'NO');
    }
    echo json_encode($arrs);
?>