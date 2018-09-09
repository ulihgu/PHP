<?php
    session_start();

    //$_SESSION=array();
    session_destroy();

    echo '<script>location="../../home/login.html"</script>';

    /* $name = $_SESSION("name");
    $password = $_SESSION("password"); */

?>