<?php
    //ini_set('error_reporting', E_ALL ^ E_NOTICE);
    #C:\xampp\htdocs\phpbos\FuturesTrade\php\Accout.php
    class myAccout{
        private $errorArray = array('error' => 'Normal: no mistake.','state'=>'OK');
        private $name;
        private $email;
        private $password1;
        private $password2;

        public function __construct($name, $email, $password1, $password2)
        {
            $this->name = $name;
            $this->email = $email;
            $this->password1 = $password1;
            $this->password2 = $password2;
        }

        //给外部公共方法
        public function printname()
        {
            //array('error' => 'Normal: no mistake.','state'=>'OK');
            //array_push($this->errorArray,"收到了");
            //$errorArray = array('error' => 'printname: no mistake.','state'=>'OK');
            validateUsername();
            return $errorArray;
        }
        public function register()
        {
            validateUsername();
            validateEmail();
            validatePassword();
            return $errorArray;
        }

        //验证用户名长度等信息
        private function validateUsername()
        {
            if (strlen( $name) > 25 || strlen( $name) < 3) {
                //array_push($this->errorArray,'用户名长度要在3-25位字符之间！');
                $errorArray = array('error' => '错误:用户名长度要在5-25位字符之间！','state'=>'NO');
                return;
            }
            //TODO:检查用户名是否存在
        }

        //验证邮箱等信息
        private function validateEmail()
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorArray = array('error' => '错误:邮箱地址不合法！','state'=>'NO');
                return;
            }
            //TODO:检查邮箱是否存在
        }

        //验证密码等信息
        private function validatePassword()
        {
            if ( $password1 !=  $password2) {
                $errorArray = array('error' => '错误:两次密码不一致！','state'=>'NO');
                return;
            }
            if (preg_match('/[^A-Za-z0-9]/', $password1)) {
                //array_push($this->errorArray,'密码只能是数字和字母组成！');
                $errorArray = array('error' => '错误:密码只能是数字和字母组成！');
                return;
            }

            if (strlen( $password1) > 25 || strlen( $password1) < 3) {
                $errorArray = array('error' => '错误:密码长度要在3-25位字符之间！','state'=>'NO');
                return;
            }
        }
    }
?>
