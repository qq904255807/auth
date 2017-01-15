<?php
//项目中需要用到的函数
       
        function getLastTime(){
            
            date_default_timezone_set("Asia/chongqing");
            if (!empty($_COOKIE['lastVisit'])){
                echo "你上次登录的时间是".$_COOKIE['lastVisit'];               
                //跟新时间
                setCookie("lastVisit",date("Y-m-d  H:i:s"),time()+7*24*3600);
            }else {
                echo "你是第一次登陆";                
                //更新时间
                setcookie("lastVisit",date("Y-m-d  H:i:s"),time()+7*24*3600);
            }                  
        }
        
        function getCookieVal($key){
            if (empty($_COOKIE[$key])){
                return "";
            }else {
                return $_COOKIE[$key];
            }
        }        
        function checkUserValidate(){
		session_start();
            	if (empty($_SESSION['loginuser'])){
                header("Location: login.php?errno=1");
            }
    
        }
?>