<?php
    #获取session
    session_start();
    $name =$_SESSION["name"];
    $email = $_SESSION["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>page2</title>
</head>
<body>
    <div>您的名字是：<?php echo $name ?>
    <p>您的油箱是：<?php echo $email ?></p>
    </div>
    <a href="page3.php">go to page3</a>
</body>
</html>