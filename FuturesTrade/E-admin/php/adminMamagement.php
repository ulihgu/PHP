<?php
 ini_set("error_reporting",E_ALL ^ E_NOTICE);
 $state='2';

 if (isset($_POST['state'])) {
     $state = $_POST['state'];
 }

 //查询所有用户数据
 function fetchData($sql)
 {       
     /* $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
     $mysql_username = 'root';
     $mysql_password = 'ulihgu21';
     $mysql_database = 'mysqldatabase';
     $dsn='mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
     $dbcon=new PDO($dsn,$mysql_username,$mysql_password); */
     include "../../php/sqlConfig.php";
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

 if($state == '1'){
    $sql = "SELECT id,user,city,email,joinTime,isadmin FROM account WHERE isadmin='1'";       
    fetchData($sql);   
 }
 if($state == '0'){
    $sql = "SELECT id,user,city,email,joinTime,isadmin FROM account WHERE isadmin='0'";       
    fetchData($sql);   
 }
 if($state == '2'){
    $sql = "SELECT id,user,city,email,joinTime,isadmin FROM account";       
    fetchData($sql);   
 }

?>