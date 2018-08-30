<?php
    #C:\xampp\htdocs\phpbos\user\index.php
    include "../public/common/config.php";

    $id = $_GET['id'];
    $sql = "select * from user where id={$id}";
    $query = $sqlConnect->prepare($sql);    
    $query->execute();
    //$result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $rows =$query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改用户</title>

</head>
<body>
    <div>
    <h3>修改用户</h3>
        <hr>
       <form action="update.php" method='post'>
           <p>用户名</p>
           <p><input type="text" name ="username" value ='<?php echo $rows['username']?>'></p>
           <p>密码</p>
           <p><input type="text" name ="password"value ='<?php echo $rows['password']?>'></p>
           <p>
               <input type="hidden" name = "id" value='<?php echo $id ?>'>
               <input type="submit" value = "提交">
               <input type="reset" value = "重置">
           </p>
       </form>
    </div>
        

</body>
</html>