<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);    
    include("mySqlData.php");
    include("Accout.php");
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

   /*  if (strlen($name) > 25 || strlen($name) < 3) {
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
        //array_push($this->errorArray,'密码只能是数字和字母组成！');
        $this->$errorArray = Array('error' => '错误:密码只能是数字和字母组成！');
        return;
    }

    if (strlen($password1) > 25 || strlen($password1) < 3) {
        $arrs = array('error' => '错误:密码长度要在3-25位字符之间！', 'state' => 'NO');
    } */
////////////////////检查填写的数据//////////////

    //$arrs = array('error' =>'错误:测试格式！0','name'=>$name,'email'=>$email,'password'=>$password1);
    //$accout->register($name,$email,$password1,$password2);

    //判断是否报错：TRUE没有错误 执行插入数据库 FALSE:返回错误信息。
    //$arrs = array('error' =>'正常:没有问题！','state'=>'OK');
    $myaccout = new myAccout($name,$email,$password1,$password2);
    

   /*  try{
        if($arrs['state']=='OK')
        {
            //$mysql_in = new MySqlData();
            $sql = "INSERT INTO account(user,password,email)VALUES('{$name}','{$password1}','{$email}')";   
            //$arrs = array($mysql_in->insertData($sql));
            $arrs = array('error' =>'正常:插入数据成功！','state'=>'OK');
        }
    }catch(PDOException $e){
       $arrs = array('error' =>'正常:插入数据库失败！','state'=>'NO');
    }  */
    echo json_encode($myaccout->register());
?>