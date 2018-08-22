<?php
    if(isset($_GET["name"])){
        //echo $_GET["name"];
        $name = $_GET["name"];
      //  echo $name;
    }
  /*   if(isset($_GET["email"])){
        //echo $_GET["name"];
        $emain = $_GET["email"];
        echo $emain;
    } */

  /*   if(isset($_REQUEST["name"])){
        print_r($_REQUEST);
        $name = $_REQUEST["name"];
        //echo $name;
    } */
       /*  echo $_SERVER["QUERY_STRING"]; */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my website</title>
</head>
<body>
    <form action="get_post.php" method="POST">
        <div>
            <label for="">名字：</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">邮箱：</label>
            <input type="text" name="email">
        </div>
        <input type="submit" value="确认">
    </form>
    <ul>
        <li><a href="get_post.php?name=Henry">Henry</a></li>
        <li><a href="get_post.php?name=Benry">Benry</a></li>
    </ul>
        <h1>
        <?php echo "我的名字是：{$name}"; ?>
        </h1>
</body>
</html>