<?php
     $mysql_server_name = 'cdb-7ccs7hos.bj.tencentcdb.com:10034';
     $mysql_username = 'root';
     $mysql_password = 'ulihgu21';
     $mysql_database = 'mysqldatabase';

     $dsn='mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
     $sqlConnect=new PDO($dsn,$mysql_username,$mysql_password);     
?>