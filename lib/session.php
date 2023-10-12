<?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }
public static function set($key, $val){
    $_SESSION[$key] = $val;
 }

 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }

 public static function check_adminSession(){
    self::init();
    if (self::get("adminlogin")== false) {
     self::destroy();
     header("Location:login.php");
    }
 }

 public static function check_adminLogin(){
    self::init();
    if (self::get("adminlogin") == true) {
     header("Location:index.php");
    }
 }

 public static function check_userSession(){
    self::init();
    if (self::get("user")== false) {
     self::destroy();
     header("Location:login.php");
    }
 }

 public static function check_userLogin(){
    self::init();
    if (self::get("user") == true) {
     header("Location:index.php");
    }
 }


 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>
