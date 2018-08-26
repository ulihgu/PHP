<?php
   // $password = "";
   // $email = "";
   ini_set("error_reporting",E_ALL ^ E_NOTICE);
    if (isset($_REQUEST['hpassword'])) {
        $password = $_REQUEST['hpassword'];
        //echo $email;
    }
    if (isset($_REQUEST['hemail'])) {
        $email = $_REQUEST['hemail'];
        //echo $email;
    }
    //查询数据接收到的EMAIL名称 
        /* if($email =='ulihgu@msn.com') {
            $data = Array(
                'email' =>$email,
                'password'=>$password,
            ) ;
        }else{
            $data = array('没有查询到相关数据');
        } */

    //存储到SESSION中
    //session_start(); # 如果不执行些方法，不能使用SESSION
    //$_SESSION["email"] = $email;
    //$_SESSION["possword"] =$password;

    //header("Location:../index.html");

    //登录查看用户输入的数据是否存在phpbos\FuturesTrade\php\login.php
    function fetchData($sql)
    {       
        $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
        $mysql_username = 'root';
        $mysql_password = 'ulihgu21';
        $mysql_database = 'mysqldatabase';
        //连接数据库phpbos\mysql1\api.php
       try{  
           $dsn='mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
           $dbcon=new PDO($dsn,$mysql_username,$mysql_password);

           if($dbcon){
               //$data = array("数据连接成功！");
               $stmt = $dbcon->prepare($sql);    
               $stmt->execute();
               $result = $stmt->fetchAll(PDO::FETCH_OBJ);
               //$row_count = $stmt->rowCount();

               //$data = array($result);
           }else{
            $dbcon = null;
            $data = array("数据连接失败！");
           }
       }catch(PDOException $e){
        $data = array("数据连接失败！");
       }
       echo json_encode($result);
    }
    $sql = "SELECT user,city,email FROM account WHERE email='$email' AND password ='$password'";       
    //echo json_encode(array($sql)); 
    fetchData($sql);
    
?>