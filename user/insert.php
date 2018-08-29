<?php
    include "../public/common/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $time = time();

    $sql = "insert into user(username,password,time) values('{$username}','{$password}',{$time})";
    $query = $sqlConnect->prepare($sql);    
    
    if($query->execute()){
        echo "<script>alert('添加成功')</script>";
    }else{
        echo "<script>alert('添加失败')</script>";
        echo "<script>location = 'add.php'</script>";
    }
    echo "<script>location = 'index.php'</script>";
?>