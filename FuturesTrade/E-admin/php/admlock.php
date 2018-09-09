<?php
    session_start();
    try {
        if(isset($_SESSION['admin_userid'])) {
            $arrs = array('username' => $_SESSION['admin_username'], 'state' => 'OK');
        } else {
            //$arrs = array('error' => '失败:请先登录', 'state' => 'NO');
            $arrs = array('error' => '失败:请先登录', 'state' => 'NO');
        }
    } catch (Exception $e) {
    }
    echo json_encode($arrs);
?>
