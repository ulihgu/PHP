<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>

</head>
<body>
<center>
    <div>
    <h1>添加用户</h1>
        <hr>
       <form action="insert.php" method='post'>
           <p>用户名</p>
           <p><input type="text" name ="username"></p>
           <p>密码</p>
           <p><input type="password" name ="password"></p>
           <p>
               <input type="submit" value = "提交">
               <input type="reset" value = "重置">
           </p>
       </form>
    </div>
</center>

</body>
</html>