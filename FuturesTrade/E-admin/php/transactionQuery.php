<?php
 ini_set("error_reporting",E_ALL ^ E_NOTICE);
 $state='2';

 if (isset($_POST['state'])) {
     $state = $_POST['state'];
 }
 //查询所有用户数据
 function fetchData($sql)
 {       
     include "../../php/sqlConfig.php";
     //连接数据库phpbos\mysql1\api.php
    try{             
        if($sqlConnect){
            $query = $sqlConnect->prepare($sql);
            $query->execute();
            $arrs = $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
         $arrs = array('error' => '数据连接失败！', 'state' => 'NO'); 
        }
    }catch(PDOException $e){
     $arrs = array('error' => '数据连接失败！', 'state' => 'NO'); 
    }
    echo json_encode($arrs);
 }

 if($state == '1'){
    $sql = "SELECT id,stockName,stockCode,price,inventory,amountOfMoney,profit FROM commodityStock WHERE stockCode='{$stockCode}'";       
    fetchData($sql);   
 }
 if($state == '0'){
    $sql = "SELECT id,stockName,stockCode,inventory,amountOfMoney FROM commodityStock";       
    fetchData($sql);   
 }
 //查询库存量信息
 if($state == '2'){
    $sql = "SELECT id,stockName,price,stockCode,inventory,amountOfMoney,profit FROM commodityStock";       
    fetchData($sql);   
 }
 //查询交易记录明细
 if($state == '3'){
    $sql = "SELECT id,shares_name,shares_code,shares_price,shares_amount,shares_money,priceLoss,smallk,shrinkage,upward,positives,daysNumber,middleUpward,rails,enlarge,vaginalLine,stopFalling,state,time FROM shares_stock";       
    fetchData($sql);   
 }

?>