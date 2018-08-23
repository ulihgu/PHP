<?php 
    #\htdocs\phpbos\webserver3\page1.php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        #存储到SESSION中
        session_start();#如果不执行此方法，不能使用SESSION
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;

        header("Location:page2.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP session</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name = "name" placecholder ="Enter Name">
    <input type="text" name = "email" placecholder ="Enter Email">
    <input type="submit" name ="submit" value = "submit">
    
    </form>
</body>
</html>