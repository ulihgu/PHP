<?php
    include "../public/common/config.php";

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

    $sql = "insert into shares_stock(index_zb,index_xt,shares_amount,shares_price,positives,priceLoss,shrinkage,smallK,stockCode,stockName,upward,time) 
    values('{'{$index_zb}','{$index_xt}',$buyAmount}','{$dealPrice}','{$positives}','{$priceLoss}','{$shrinkage}','{$smallK}','{$stockCode}','{$stockName}','{$upward}',{$time})";
    $query = $sqlConnect->prepare($sql);    
    
    $arrs = array();
    if($query->execute()){
        echo "<script>alert('添加成功')</script>";
        $arrs = array('error' =>'正常:没有问题！','state'=>'OK');
    }else{
        $arrs = array('error' => '错误:写入数据库失败！', 'state' => 'NO');
    }
    echo json_encode($arrs);
?>