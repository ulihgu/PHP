<?php
   #C:\xampp\htdocs\phpbos\user\login.php
   #http://localhost/htdocs/phpbos/user/login.php
    include "../public/common/config.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user where username='{$username}' and password='{$password}'";

    //查询得到的行数
    //$count = $sqlConnect->query($sql)->rowCount();//取查询到的行数
    //$count = $ement->rowCount();
    //echo $count;
    //查询结果集
    $query = $sqlConnect->query($sql);
    $rows = $query->fetch(PDO::FETCH_ASSOC);

    //print_r ($rows);

    if($rows){
        setcookie('username',$username,time()+3600,'/');
        setcookie('userid',$rows['id'],time()+3600,'/');

        echo "<script>location = 'index.php'</script>";
    }else{
        echo "<script>location = 'login.php'</script>";
    }
?>