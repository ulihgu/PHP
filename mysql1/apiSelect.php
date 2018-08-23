<?php
    #C:\xampp\htdocs\phpbos\mysql1\apiSelect.php
    function fetchData($sql)
    {
        //连接数据库phpbos\mysql1\api.php
        $mysqli = new mysqli('localhost', 'root', '', 'mydatabase');
        //判断数据库是否连接成功
        if ($mysqli->connect_errno) {
            //只要不为0 就表示连接失败
            die($mysqli->connect_errno);
        }

        //设定编码格式
        $mysqli->query('set names utf8');

        $result = $mysqli->query($sql);
        //判断查询是否成功
        if ($result->num_rows) {
            //echo '查询数据成功';
            //查询数据的第一种方法
            //$row = $result->fetch_row();
            /* while($row = $result->fetch_row()){
                print_r($row);
            } */
             #第二种方法
          /*   while($row = $result->fetch_array(MYSQLI_ASSOC)){
            print_r($row);
            echo "<hr>"; 
          }*/
          
            #第三种方法
            $row = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($row);
        
        } else {
            //echo '查询数据失败';
        }        

        //关闭数据
        $mysqli->close();
    }
    $sql = "SELECT * FROM customers";
    fetchData($sql);
?>
