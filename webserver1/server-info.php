<?php
    #服务器

    #创建服务器数组信息

    $server = [
        "Host Server Name" => $_SERVER["SERVER_NAME"],
        "Server Software" => $_SERVER["SERVER_SOFTWARE"],
        "Document Root" => $_SERVER["DOCUMENT_ROOT"],
        "Http Host" => $_SERVER["HTTP_HOST"],
        "Script Name" => $_SERVER["SCRIPT_NAME"],
        "Absolute Path" => $_SERVER["SCRIPT_FILENAME"],
        "Current Page" => $_SERVER["PHP_SELF"]
    ];
    // echo $server["Host Server Name"];
     //print_r($server);
    #localhost/phpbos/webserver1
    
    #创建客户端数据组信息
    $client =[
        "Client System Info" => $_SERVER["HTTP_USER_AGENT"],
        "Client IP" => $_SERVER["REMOTE_ADDR"],
        "Remote Port" => $_SERVER["REMOTE_PORT"]
    ];

    //print_r($client);
?>