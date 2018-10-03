<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE); 
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
    $daysNumber = $_POST['daysNumber'];
    $enlarge = $_POST['enlarge'];
    $middleUpward = $_POST['middleUpward'];
    $rails = $_POST['rails'];
    $vaginalLine = $_POST['vaginalLine'];
    $stopFalling = $_POST['stopFalling'];
    $shares_money = $dealPrice*$buyAmount;

    $time = date('Y-m-d H:i:s');

    include "../../php/sqlConfig.php";
    
    $sql = "INSERT INTO shares_stock(shares_money,index_zb,index_xt,shares_amount,shares_price,positives,priceLoss,shrinkage,smallK,shares_code,shares_name,upward,daysNumber,enlarge,middleUpward,rails,vaginalLine,stopFalling,state,time)
    VALUES('{$shares_money}','{$index_zb}','{$index_xt}','{$buyAmount}','{$dealPrice}','{$positives}','{$priceLoss}','{$shrinkage}','{$smallK}','{$stockCode}','{$stockName}','{$upward}','{$daysNumber}','{$enlarge}','{$middleUpward}','{$rails}','{$vaginalLine}','{$stopFalling}','卖入','{$time}')";
    $query = $sqlConnect->prepare($sql);    
    
    $arrs = array();
    if($query->execute()){
        //$arrs = array('error' =>'正常:没有问题！'.$middleUpward,'state'=>'OK');
        $sql_code = "SELECT stockCode FROM commodityStock WHERE stockCode='{$stockCode}'";
        $query = $sqlConnect->query($sql_code);
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        if($rows){
            //如果存在买过的股票进行更新库存
            $amountOfMoney = $buyAmount*$dealPrice;
            $sql_update = "UPDATE commodityStock SET inventory=inventory+$buyAmount,amountOfMoney=amountOfMoney+$amountOfMoney WHERE stockCode='{$stockCode}'";
            $query = $sqlConnect->exec($sql_update);
            if($query){
                $arrs = array('error' =>'正常:买入成功！','state'=>'OK','position'=>'存在数据添-更新-到库存中!');
             }else{
                $arrs = array('error' =>'错误:买入失败！','state'=>'NO','position'=>'存在数据添-更新-到库存中!');
            }
        }else{
            $amountOfMoney = $dealPrice*$buyAmount;
            $sql_insert = "INSERT INTO commodityStock(stockName,amountOfMoney,inventory,price,stockCode,time)
            VALUES('{$stockName}','{$amountOfMoney}','{$buyAmount}','{$dealPrice}','{$stockCode}','{$time}')";
            $query = $sqlConnect->exec($sql_insert);
            if($query){
                $arrs = array('error' =>'正常:买入成功！','state'=>'OK','position'=>'无查询数据-添加-库存中!');
            }else{
                $arrs = array('error' =>'错误:买入失败！','state'=>'NO','position'=>'无查询数据-添加-库存中!');
            }            
        }
    }else{
        $arrs = array('error' => '错误:写入数据库失败！', 'state' => 'NO','time' => $time);
    }
    echo json_encode($arrs);
?>