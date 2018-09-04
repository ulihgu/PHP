<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);
    include("Accout.php");    
    //include("mySqlData.php");
    //localhost/phpbos/FuturesTrade/php/signInCheck.php
    //处理用户名
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
    if (isset($_REQUEST['hemail'])) {
        $email = sanitizeFormEmail($_REQUEST['hemail']);
    } 
    if (isset($_REQUEST['husername'])) {
        $name = sanitizeFormUsername($_REQUEST['husername']);        
    }   
    if (isset($_REQUEST['hpassword1'])) {
        $password1 = $_REQUEST['hpassword1'];

    }
    if (isset($_REQUEST['hpassword2'])) {
        $password2 = $_REQUEST['hpassword2'];
    } 

    $accout = new Accout();
    //$arrs = Array('error' =>'错误:邮箱地址不合法！2','name'=>$name,'email'=>$email,'password'=>$password1);
    $arrs = array($accout->register($name,$email,$password1,$password2));
    //判断是否报错：TRUE没有错误 执行插入数据库 FALSE:返回错误信息。
    try{
        if($arrs[0]==null)
        {
            //$mysql_in = new MySqlData();
            $sql = "INSERT INTO account(user,password,email)VALUES('{$name}','{$password1}','{$email}')";       
            //$arrs = array($mysql_in->insertData($sql));
            //$arrs = Array('error' =>'正常:没有问题！');
            //$arrs = array($arrs); 
        }
    }catch(PDOException $e){
        //$arrs = Array('error' =>'错误:插入语法错误！EXP');
        //$arrs = array($arrs); 
    } 
   
    echo json_encode($arrs);
?>