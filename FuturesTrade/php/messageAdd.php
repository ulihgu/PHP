<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE); 
    session_start();    
    try {
        include "sqlConfig.php";
        $state = $_POST['state'];
        if($state=='0')
        {
            if(isset($_SESSION['userid']))
            {
                $userid = $_SESSION['userid'];
                $username = $_SESSION['username'];
                $amessage = $_POST['amessage'];
    
                $time = date('Y-m-d H:i:s');   
                
                $sql_add = "INSERT INTO message(userid,username,amessage,time)VALUES('{$userid}','{$username}','{$amessage}','{$time}')";
                $query = $sqlConnect->exec($sql_add);
                if($query)
                {
                    $sql_cx = "SELECT id,userid,username,amessage,time FROM message";
                    $query = $sqlConnect->prepare($sql_cx);
                    $query->execute();
                    $arrs = $query->fetchAll(PDO::FETCH_ASSOC);
                    //$arrs = array('error' =>'正常:留言成功！','state'=>'OK');
                }else{
                    $arrs = array('error' =>'留言失败,插入记录表失败！','state'=>'ON');
                }
                    //$arrs = array('username' => $_SESSION['username'], 'state' => 'OK');
            } else {
                    $arrs = array('error' => '请先登录!', 'state' => 'NO');
            }
        }else{
            $sql_zd = "SELECT id,userid,username,amessage,time FROM message";
            $query = $sqlConnect->prepare($sql_zd);
            $query->execute();
            $arrs = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
    } catch (Exception $e) {
    }
    echo json_encode($arrs);
?>
