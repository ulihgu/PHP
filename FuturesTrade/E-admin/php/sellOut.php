<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE); 
    $sellAmount = $_POST['sellAmount'];//数量
    $dealPrice = $_POST['dealPrice'];//成交价格
    $index_zb = $_POST['index_zb'];//指标
    $stockCode = $_POST['stockCode'];
    $inventory = $_POST['inventory'];
    $state = $_POST['state'];

    $time = date('Y-m-d H:i:s');
    $amountOfMoney = $sellAmount*$dealPrice;//当前库存金额=库存-(卖出量*单价)

    include "../../php/sqlConfig.php";
    //库存量:执行减去相应的卖出量
    $sql_update = "UPDATE commodityStock SET inventory=inventory-$sellAmount,amountOfMoney=amountOfMoney-$amountOfMoney WHERE stockCode='{$stockCode}'";    
    $query = $sqlConnect->exec($sql_update);    
    $arrs = array();
    //判断是否卖出成功
    if($query){
        //卖出成功后，进行在交易明细表中插入成交记录
        $sql = "INSERT INTO shares_stock(shares_money,smallK,shares_amount,shares_price,shares_code,state,time)VALUES('{$amountOfMoney}','{$index_zb}','{$sellAmount}','{$dealPrice}','{$stockCode}','{$state}','{$time}')";
        $query = $sqlConnect->exec($sql);
        if($query){
            $arrs = array('error' =>'正常:卖出成功！','state'=>'OK');
        }else{
            $arrs = array('error' =>'失败:卖出失败,插入记录表失败！','state'=>'ON');
        }
    }else{
        $arrs = array('error' => '卖出失败:数据库执行语句失败,修改库存量失败！', 'state' => 'NO','time' => $time);
    }
    echo json_encode($arrs);
?>