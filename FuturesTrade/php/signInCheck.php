<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);
    include("Accout.php");    
    #\phpbos\FuturesTrade\php\signInCheck.php
    
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

    echo json_encode($arrs);

?>