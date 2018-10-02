<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE); 
    $buyAmount = $_POST['buyAmount'];//数量
    $dealPrice = $_POST['dealPrice'];//成交价格
    $index_zb = $_POST['index_zb'];//指标
    $stockCode = $_POST['stockCode'];
    $state = $_POST['state'];

    $time = date('Y-m-d H:i:s');

    include "../../php/sqlConfig.php";
    //库存量:执行减去相应的卖出量
    $sql = "UPDATE commodityStock SET inventory=inventory-$buyAmount WHERE stockCode='{$stockCode}'";    
    $query = $sqlConnect->prepare($sql);    
    $arrs = array();
    //判断是否卖出成功
    if($query->execute()){
        //卖出成功后，进行在交易明细表中插入成交记录
        $sql = "INSERT INTO shares_stock(index_zb,shares_amount,shares_price,shares_code,state,time)VALUES('{$index_zb}','{$buyAmount}','{$dealPrice}','{$stockCode}','{$state}','{$time}')";
        $query = $sqlConnect->prepare($sql);
        if($query->execute()){
            $arrs = array('error' =>'正常:卖出成功！','state'=>'OK');
        }
    }else{
        $arrs = array('error' => '卖出失败:数据库执行语句失败,修改库存量失败！', 'state' => 'NO','time' => $time);
    }
    echo json_encode($arrs);
?>