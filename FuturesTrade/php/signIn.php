<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);    
    //include("mySqlData.php");
    //include("Accout.php");
    //localhost/phpbos/FuturesTrade/php/signIn.php
    //处理用户名
    $arrs = array();
    function sanitizeFormUsername($inputText){
        $inputText = str_replace(" ","",$inputText);
        $inputText = ucfirst(strtolower($inputText));//首字母大写，其它小写
        return $inputText;
    }
    //处理油箱地址
    function sanitizeFormEmail($inputText){
        $inputText = str_replace(" ","",$inputText);//取消空格
        return $inputText;
    }
    //处理密码方法
    function sanitizeFormPassword($inputText){
        return $inputText;
    }     
    if (isset($_POST['hemail'])) {
        $email = sanitizeFormEmail($_POST['hemail']);
    } 
    if (isset($_POST['husername'])) {
        $name = sanitizeFormUsername($_POST['husername']);        
    }   
    if (isset($_POST['hpassword1'])) {
        $password1 = $_POST['hpassword1'];

    }
    if (isset($_POST['hpassword2'])) {
        $password2 = $_POST['hpassword2'];
    } 
    ////////////////////检查填写的数据//////////////
    $arrs = array('error' =>'正常:没有问题！','state'=>'OK');
    if (strlen($name) > 25 || strlen($name) < 3) {
        //array_push($this->errorArray,'用户名长度要在3-25位字符之间！');
        $arrs = array('error' => '错误:用户名长度要在5-25位字符之间！', 'state' => 'NO');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $arrs = array('error' => '错误:邮箱地址不合法！', 'state' => 'NO');
    }
    if ($password1 != $password2) {
       $arrs = array('error' => '错误:两次密码不一致！', 'state' => 'NO');
    }
     if (preg_match('/[^A-Za-z0-9]/', $password1)) {
        $arrs = array('error' => '错误:密码只能是数字和字母组成！', 'state' => 'NO');
    }

    if (strlen($password1) > 25 || strlen($password1) < 3) {
        $arrs = array('error' => '错误:密码长度要在3-25位字符之间！', 'state' => 'NO');
    }
   ////////////////////测试用的CLASS的数据//////////////N
    //$arrs = array('error' =>'错误:测试格式！0','name'=>$name,'email'=>$email,'password'=>$password1);
    //$accout->register($name,$email,$password1,$password2);
    //判断是否报错：TRUE没有错误 执行插入数据库 FALSE:返回错误信息。
     try {
       if ($arrs['state'] == 'OK') {
         $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
         $mysql_username = 'root';
         $mysql_password = 'ulihgu21';
         $mysql_database = 'mysqldatabase';
         $dsn = 'mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
         $sqlConnect = new PDO($dsn, $mysql_username, $mysql_password);

        
         if ($sqlConnect){
             //检查是否有重复的账号
            $checksql = "select * from account where email='{$email}' or user='{$name}'";
            $cquery = $sqlConnect->query($checksql);
            $rows = $cquery->fetch(PDO::FETCH_ASSOC);
            if(!$rows){
                //插入数据库
                $insertsql = "INSERT INTO account(user,password,email)VALUES('{$name}','{$password1}','{$email}')";
                $query = $sqlConnect->prepare($insertsql);
                if ($query->execute()) {
                    //存储到SESSION中
                    //session_start(); // 如果不执行些方法，不能使用SESSION
                    //$_SESSION['email'] = $email;
                    //$_SESSION['name'] = $password;
                    //存储到COOKIE
                    //setcookie('email',$email)
                    //$this->$errorArray = Array('error' =>null);
                    $arrs = array('error' => '正常:注册用户成功！', 'state' => 'OK');
                } else {
                    $arrs = array('error' => '错误:执行写入数据库失败！', 'state' => 'NO');
                }
            }else{
                $arrs = array('error' => '错误:邮箱或昵称被占用！', 'state' => 'NO');
            }
         } else {
             //$sqlConnect = null;//现在运行完成，在此关闭连接
             $arrs = array('error' => '错误:连接数据库失败！', 'state' => 'NO');
         }
         $sqlConnect = null; //现在运行完成，在此关闭连接
        }
    } catch (PDOException $e) {
        $arrs = array('error' => '正常:插入数据库失败！', 'state' => 'NO');
    }
    echo json_encode($arrs);
?>