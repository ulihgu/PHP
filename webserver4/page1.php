<?php 
    #\htdocs\phpbos\webserver3\page1.php
    if(isset($_POST["submit"])){
       $username = $_POST["username"];
       setcookie("username",$username,time()+3600);

       header("Location:page2.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Cookies</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name = "username" placecholder ="Enter UserName">
<!--     <input type="text" name = "email" placecholder ="Enter Email"> -->
    <input type="submit" name ="submit" value = "submit">
    
    </form>
</body>
</html>