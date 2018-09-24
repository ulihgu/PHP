<?php
    ini_set('error_reporting', E_ALL ^ E_NOTICE);
    class MySqlData{
        private $errorArray;

        public function __construct()
        {
            $this->$errorArray = array();
        }

        public function insertData($sql)
        {
            /* $mysql_server_name = 'cdb-7ccs7hos.bj.tencentcdb.com:10034';
            $mysql_username = 'root';
            $mysql_password = 'ulihgu21';
            $mysql_database = 'mysqldatabase';
            $dsn = 'mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
            $sqlConnect = new PDO($dsn, $mysql_username, $mysql_password); */
            include "../../php/sqlConfig.php";
            try {
                if ($sqlConnect) {
                    //$data = array("数据连接成功！");
                    $query = $sqlConnect->prepare($sql);
                    if ($query->execute()) {
                        //存储到SESSION中
                        //session_start(); // 如果不执行些方法，不能使用SESSION
                        //$_SESSION['email'] = $email;
                        //$_SESSION['name'] = $password;
                        //存储到COOKIE
                        //setcookie('email',$email)
                        //$this->$errorArray = Array('error' =>null);
                        $this->$errorArray = array('error' => '正常:注册用户成功！','state'=>'OK');
                    } else {
                        $this->$errorArray = array('error' => '错误:注册用户失败！','state'=>'NO');
                    }                    
                } else {
                    //$sqlConnect = null;//现在运行完成，在此关闭连接
                    $this->$errorArray = array('error' => '错误:连接数据库失败！','state'=>'NO');
                }
            } catch (PDOException $e) {
                $this->$errorArray = array('error' => '错误:注册用户失败！','state'=>'NO');
            }
            $sqlConnect = null; //现在运行完成，在此关闭连接
            return $this->$errorArray;
        }

        public function modifyData($sql)
        {
            $this->$errorArray = array('error' => '错误:注册用户失败！','state'=>'NO');
        }

        public function deleteData($sql)
        {
            $this->$errorArray = array('error' => '错误:注册用户失败！','state'=>'NO');
        }
    }
