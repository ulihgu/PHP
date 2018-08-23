<?php

        $msg ="";
        $mesCalss="";
    if(filter_has_var(INPUT_POST,"submit")){
        #获取表单内容
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        #验证内容是否为空
        if(!empty($email) && !empty($name) && !empty($message)){
            #pass
        }else{
            #failed
        }

    }


  #\index.php
?>