<?php
    session_start();

    //$_SESSION=array();
    session_destroy();

    echo '<script>location="../index.html"</script>';

    /* $name = $_SESSION("name");
    $password = $_SESSION("password"); */

?>