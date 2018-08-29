<?php
    include "../public/common/config.php";

    $id =$_GET['id'];
    $sql = "delete from user where id={$id}";
    $query = $sqlConnect->prepare($sql);    
    
    if($query->execute()){
        echo "<script>alert('删除成功')</script>";
    }else{
        echo "<script>alert('删除失败')</script>";
    }
    echo "<script>location = 'index.php'</script>";
?>