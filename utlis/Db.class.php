<?php

/**
 * Created by PhpStorm.
 * User: chenq
 * Date: 2016/3/23
 * Time: 15:34
 */

class Db
{
    private  static $localhost = 'localhost';
    private  static $user_name = 'root';
    private  static $password = 'root';
    private  static $db_name = 'school_info';
    private  static $Link = null;

    public static function getLink()
    {
        if(static::$Link instanceof mysqli){
            return self::$Link;
        }else{
            self::$Link = new mysqli(self::$localhost,self::$user_name,self::$password,self::$db_name);
            return static::$Link;
        }
    }


}