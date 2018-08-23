<?php
    function insertData($sql)
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
        //判断插入是否成功
        if ($result) {
            echo '插入成功';
        } else {
            echo '插入失败';
        }

        //关闭数据
        $mysqli->close();
    }
    $sql ="INSERT INTO `customers` (`id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`)
     VALUES (NULL, '测试1', 'wu', '55555555@msn.com', '北京昌平区', '北京', '朱X庄');
    ";
    //insertData($sql);

    function updateData($sql)
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
        //判断插入是否成功
        if ($result) {
            echo '修改成功';
        } else {
            echo '修改失败';
        }

        //关闭数据
        $mysqli->close();
    }

    $sql = "UPDATE `customers` SET `firstName`='修改1',`lastName`='吴' WHERE id= 4 ";

    //updateData($sql);

    function deleteData($sql)
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
        //判断插入是否成功
        if ($result) {
            echo '删除数据成功';
        } else {
            echo '删除数据失败';
        }

        //关闭数据
        $mysqli->close();
    }
    $sql = "DELETE FROM customers WHERE id =5";
    deleteData($sql);
?>