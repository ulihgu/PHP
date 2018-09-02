<?php
    
    class Accout{
        private $errorArray;
        public function __construct(){
            $this ->errorArray=array();
        }
        //给外部公共方法
        public function register($name_a,$email_a,$password1_a,$password2_a){
           $this->validateUsername($name_a);
           $this->validateEmail($email_a);
           $this->validatePassword($password1_a, $password2_a);
        return $this->$errorArray;
        }
        //验证用户名长度等信息
        private function validateUsername($name_a){
            if(strlen($name_a)>25 || strlen($name_a)<3){
                //array_push($this->errorArray,'用户名长度要在3-25位字符之间！');
               $this->$errorArray = Array('error' =>'错误:用户名长度要在5-25位字符之间！');
                return ;
            }
            //TODO:检查用户名是否存在
        }

        //验证邮箱等信息
        private function validateEmail($email_a){
            if(!filter_var($email_a,FILTER_VALIDATE_EMAIL)){
                //array_push($this->errorArray,'邮箱地址不合法！');
                //$errorArray["error"] ='错误:邮箱地址不合法！';
                $this->$errorArray = Array('error' =>'错误:邮箱地址不合法！');
                return ;
            }
            //TODO:检查邮箱是否存在
        }

        //验证密码等信息
        private function validatePassword($password1_a, $password2_a){
            if($password1_a!=$password2_a){
                $this->$errorArray = Array('error' =>'错误:两次密码不一致！');
                //echo print_r($errorArray);
                return ;
            }
            if(preg_match('/[^A-Za-z0-9]/',$password1_a)){
                //array_push($this->errorArray,'密码只能是数字和字母组成！');
                $this->$errorArray = Array('error' =>'错误:密码只能是数字和字母组成！');
                return ;
            }

            if(strlen($password1_a)>25 || strlen($password1_a)<3){
                $this->$errorArray = Array('error' =>'错误:密码长度要在3-25位字符之间！');
                return ;
            }
        }
    }


?>