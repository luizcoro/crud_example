<?php

class database
{
    private static $_db_name     = 'crud_example';
    private static $_db_host     = 'localhost';
    private static $_db_username = 'luiz';
    private static $_db_password = '';

    private static $_con         = null;

    public static function open()
    {

        try {
            self::$_con = new PDO('mysql:host=' . self::$_db_host . ';dbname=' . self::$_db_name, self::$_db_username, self::$_db_password);
        } catch(PDOException $e) {
            die($e->getMessage());
        }

        return self::$_con;
    }

    public static function close()
    {
        if(self::$_con != null)
            self::$_con = null;
    }
}


?>
