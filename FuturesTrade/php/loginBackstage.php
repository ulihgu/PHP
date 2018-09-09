<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);    
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['pass'])) {
        $password = $_POST['pass'];
    }  
     $sql = "select * from account where email='{$username}' and password='{$password}' and isadmin=1";
     include "sqlConfig.php";
    //查询结果集
    $query = $sqlConnect->query($sql);
    $rows = $query->fetch(PDO::FETCH_ASSOC);
    //print_r ($rows);
    if($rows){
        session_start();//开启
        /* setcookie('username',$username,time()+3600,'/');
        setcookie('userid',$rows['id'],time()+3600,'/'); */
        $_SESSION['admin_username']=$rows['user'];
        $_SESSION['admin_userid']=$rows['id'];
        echo "<script>location = '../E-admin/index.html'</script>";
    }else{
        echo "<script>alert('用户名或密码有误!')</script>";
        echo "<script>location = '../home/login.html'</script>";
    }
?>