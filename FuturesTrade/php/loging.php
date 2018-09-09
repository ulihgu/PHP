<?php
   ini_set("error_reporting",E_ALL ^ E_NOTICE);
    if (isset($_REQUEST['hpassword'])) {
        $password = $_REQUEST['hpassword'];
        //echo $email;
    }
    if (isset($_REQUEST['hemail'])) {
        $email = $_REQUEST['hemail'];
        //echo $email;
    }  
    //header("Location:../index.html");

    //登录查看用户输入的数据是否存在phpbos\FuturesTrade\php\login.php
    function fetchData($sql)
    {       
        /* $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
        $mysql_username = 'root';
        $mysql_password = 'ulihgu21';
        $mysql_database = 'mysqldatabase';
        $dsn='mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
        $dbcon=new PDO($dsn,$mysql_username,$mysql_password); */
        include "sqlConfig.php";
        //连接数据库phpbos\mysql1\api.php
       try{             
           if($sqlConnect){
               /* $stmt = $dbcon->prepare($sql);    
               $stmt->execute();
               $result = $stmt->fetchAll(PDO::FETCH_OBJ);      */ 
               //查询结果集
               $query = $sqlConnect->query($sql);
               $rows = $query->fetch(PDO::FETCH_ASSOC);
               $arrs = array('error' => '数据执行完成！', 'state' => 'OK'); 
           }else{
            $arrs = array('error' => '数据连接失败！', 'state' => 'NO'); 
           }
       }catch(PDOException $e){
        $arrs = array('error' => '数据连接失败！', 'state' => 'NO'); 
       }
       if($rows){
           //存储到SESSION中
           session_start(); // 如果不执行些方法，不能使用SESSION
           $_SESSION['username']=$rows['user'];
           $_SESSION['userid']=$rows['id']; 
           $arrs = array('error' => 'SESSION保存成功！', 'username'=>$rows['user'],'state' => 'OK'); 
       }
       echo json_encode($arrs);
    }
    $sql = "SELECT id,user,city,email FROM account WHERE email='$email' AND password ='$password'";       
    //echo json_encode(array($sql)); 
    fetchData($sql);
    
?>