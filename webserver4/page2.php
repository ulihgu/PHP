<?php
    #更改
   // setcookie("username","henry",time() +(86400*1));

   #删除
   // setcookie("username","henry",time()-3600);
    #判断有几个COOKIE
    if(count($_COOKIE)>0){
        echo " 一共有：".count($_COOKIE)."cookie";
    }else{
        echo "没有任何的";
    }

if(isset($_COOKIE["username"])){
    echo "username:".$_COOKIE["username"]."存在<br>";

   
}else{
    echo "username不存在！";
}


?>