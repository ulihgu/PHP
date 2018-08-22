<?php
//过滤器函数

//检查POST过来的数据
// if(filter_has_var(INPUT_POST,'data')){
//     echo "data found";
// }else{
//     echo "no data";
// }

//验证内容是否是邮箱
    if(isset($_POST["data"])){
        if(filter_input(INPUT_POST,"data",FILTER_VALIDATE_EMAIL)){
            echo "邮箱合法";
        }else{
            echo "邮箱不合法";
        }
    }

//http://localhost/phpbos/filters.php
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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name ="data">
    <button type="sumbit">submit</button>
    
    </form>
</body>
</html>