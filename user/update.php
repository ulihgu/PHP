<?php
    include "../public/common/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];


    $sql = "update user set username='{$username}',password='{$password}' where id='{$id}'";
    $query = $sqlConnect->prepare($sql);    
    
    if($query->execute()){
       // echo "<script>alert('修改成功')</script>";
        echo "<script>location = 'index.php'</script>";
    }else{
        echo "<script>alert('修改失败')</script>";
        echo "<script>location = 'edit.php'</script>";
    }
    
?>