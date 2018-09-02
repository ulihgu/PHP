<?php
     $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
     $mysql_username = 'root';
     $mysql_password = 'ulihgu21';
     $mysql_database = 'mysqldatabase';

     $dsn='mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
     $sqlConnect=new PDO($dsn,$mysql_username,$mysql_password);

     
?>