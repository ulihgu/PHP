<?php

     #连接数据库phpbos\mysql1\api.php
     $mysqli =new mysqli("localhost","root","","mydatabase");
     #判断数据库是否连接成功
     if($mysqli->connect_errno){
         #只要不为0 就表示连接失败
         die($mysqli->connect_errno);
     }
     
     #设定编码格式
     $mysqli->query("set names utf8");
     
     $result = $mysqli->query("INSERT INTO `customers` (`id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`) VALUES (NULL, '米修4', 'wu4', '444444f@msn.com', '北京昌平区4', '北京', '朱X庄4')");
     #判断插入是否成功
     if($result){
         echo "插入成功";
     }else{
         echo "插入失败";
     }

     #关闭数据
     $mysqli->close();
?>
