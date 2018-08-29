<?php
    #C:\xampp\htdocs\phpbos\user\index.php
    include "../public/common/config.php";

    $sql = "select * from user order by id";
    $query = $sqlConnect->prepare($sql);    
    $query->execute();
    //$result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../public/css//bootstrap.min.css">
</head>
<body>
    <center>
    <h3>查看用户| <a href="add.php">添加用户</a></h3>
    <hr>
    <table width='500px' border='1' cellspacing='0'>
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>密码</th>
            <th>注册时间</th>
        </tr>
        <?php
        for($i=0;$rows =$query->fetch(PDO::FETCH_ASSOC);$i++){
            echo "<tr>";
            //print_r($row);
            echo "<td>{$rows['id']}</td>";
            echo "<td>{$rows['username']}</td>";
            echo "<td>{$rows['password']}</td>";
            echo "<td>".date('Y-m-d H:i:s',$rows['time'])."</td>";
            echo "<td><a href ='edit.php?id={$rows['id']}'><img src='../public/images/ok.png'></a></td>";
            echo "<td><a href ='delete.php?id={$rows['id']}'><img src='../public/images/del.png'></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    </center>
  
</body>
</html>