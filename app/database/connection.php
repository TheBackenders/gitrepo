<?php


class Connection
{
    private $pdo_obj;
    const db_params = [
        'dsn' => 'mysql:host=localhost;dbname=task1_db',
        'username' => 'root',
        'password' => ''
    ];


    public static function getConnection()
    {
        try {
            $pdo_obj = new PDO(self::db_params['dsn'], self::db_params['username'], self::db_params['password']);
            return $pdo_obj;
        } catch (PDOException $ex) {

            echo ('Connection Failed : ' . $ex->getMessage());
        }
    }



    public static function Close()
    {
        $pdo_obj = null;
        return true;
    }
}
?>