<?php
 ini_set("error_reporting",E_ALL ^ E_NOTICE);
 //$state='2';
 $arrs = array();
 if (isset($_POST['mydate'])) {
     $mydate = $_POST['mydate'];
 }
 $startTime = date('Y-m-d 00:00:00');
 $endTime = date('Y-m-d H:i:s');
 //查询所有用户数据
        function fetchData($sql)
            {       
                include "sqlConfig.php";
                //连接数据库phpbos\mysql1\api.php
                try{             
                    if($sqlConnect){
                        /* $stmt = $dbcon->prepare($sql);    
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);      */ 
                        //查询结果集
                        //$query = $sqlConnect->query($sql);
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


    $sql = "SELECT shares_code,shares_name,shares_price,shares_amount,priceLoss,time FROM shares_stock WHERE time >= '{$startTime}' AND time <= '{$endTime}' AND state='卖入'";       
    fetchData($sql);   
    //$startTime2 = strtotime($startTime);
    //$endTime2 = strtotime($endTime);
    //$startTime3 = date("Y-m-d H:i:s",$startTime2);
    //$endTime3 = date("Y-m-d H:i:s",$endTime2);
    //$arrs = array('error' => '测试:查询股票数据失败！', 'state' => 'NO', 'startTime' => $startTime, 'endTime' => $endTime, '时间戳开始' => $startTime2, '时间戳结束' => $endTime2 , '时间戳转回开始' => $startTime3, '时间戳转回结束' => $endTime3);
    //echo json_encode($arrs);
?>