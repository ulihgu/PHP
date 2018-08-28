<?php
    #获取SESSION
    session_start();

    $email = $_SESSION("email");
    $name = $_SESSION("name");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>你的邮箱是：<?php echo $email; ?></div>
    <p>你的用户是:<?php  echo $name ?> </p>
</body>
</html>