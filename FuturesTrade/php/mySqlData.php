<?php
    ini_set("error_reporting",E_ALL ^ E_NOTICE);
    //include("sqlConfig.php");
    class MySqlData{
        private $errorArray;

        public function __construct(){
            $this -> $errorArray = array();            
        }        
        public function insertData($sql){                
            $mysql_server_name = 'cdb-g2r69g0e.bj.tencentcdb.com:10018';
            $mysql_username = 'root';
            $mysql_password = 'ulihgu21';
            $mysql_database = 'mysqldatabase';        
            $dsn = 'mysql:host='.$mysql_server_name.';dbname='.$mysql_database.';';
            $sqlConnect = new PDO($dsn,$mysql_username,$mysql_password);

            try{  
                if($sqlConnect){
                    //$data = array("数据连接成功！");
                    $query = $sqlConnect->prepare($sql);      
                    if($query->execute()){
                        //存储到SESSION中
                        //session_start(); // 如果不执行些方法，不能使用SESSION
                        //$_SESSION['email'] = $email;
                        //$_SESSION['name'] = $password;
                        //存储到COOKIE
                        //setcookie('email',$email)
                        //$this->$errorArray = Array('error' =>null);
                    }else{
                        $this->$errorArray = Array('error' =>'错误:注册用户失败！');
                    }
                    return $this->$errorArray; 
                }else{
                 $sqlConnect = null;
                 //$data = array("数据连接失败！");
                }
            }catch(PDOException $e){
             //$data = array("数据连接失败！");
            }
           
        }
        public function modifyData($sql){

        }
        
        public function deleteData($sql){
            
        }
    }

?>