<?php
    session_start();
    try {
        if(isset($_SESSION['userid'])) {
            $arrs = array('username' => $_SESSION['username'], 'state' => 'OK');
        } else {
            $arrs = array('error' => '失败:请先登录', 'state' => 'NO');
        }
    } catch (Exception $e) {
    }
    echo json_encode($arrs);
?>
