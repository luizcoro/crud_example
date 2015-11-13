<?php

include_once 'model/client.php';
include_once 'database.php';

class client_dao
{
    /* private static $_select = 'SELECT * FROM client WHERE email = :email'; */
    private static $_select_all = 'SELECT * FROM client';
    /* private static $_find   = 'SELECT * FROM client WHERE :column LIKE :value'; */ 
    private static $_insert = 'INSERT INTO client(email, name, mobile) VALUES(:email, :name, :mobile)';
    private static $_update = 'UPDATE client SET name = :name, mobile = :mobile WHERE email = :email';
    private static $_delete = 'DELETE FROM client  WHERE email = :email';


    /* public static $EMAIL_COLUMN = "email"; */
    /* public static $NAME_COLUMN = "name"; */
    /* public static $MOBILE_COLUMN = "mobile"; */

    /* public function select($client_email) */
    /* { */
    /*     $pdo = database::open(); */

    /*     $stmt = $pdo->prepare(self::$_select); */
    /*     $stmt->bindParam(':email', $client->get_email()); */
    /*     $stmt->execute(); */

    /*     $result = $stmt->fetch(PDO::FETCH_ASSOC); */
    /*     $client = new client($result['email'], $result['name'], $result['mobile']); */

    /*     database::close(); */

    /*     return $client; */
    /* } */

    public function select_all()
    {
        $pdo = database::open();

        $stmt = $pdo->prepare(self::$_select_all);
        $stmt->execute();

        $clients = array();

        while($result = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $clients[] = new client($result['email'], $result['name'], $result['mobile']);
        }

        database::close();
        return $clients;
    }

    /* public function find($column, $value) */
    /* { */
    /*     $pdo = database::open(); */

    /*     $stmt = $pdo->prepare(self::$_find); */
    /*     $stmt->bindParam(':email', '%' . $client->get_email() . '%'); */
    /*     $stmt->execute(); */

    /*     $clients = array(); */

    /*     while($result = $stmt->fetch(PDO::FETCH_ASSOC)) */
    /*     { */
    /*         $clients[] = new client($result['email'], $result['name'], $result['mobile']); */
    /*     } */

    /*     database::close(); */

    /*     return $clients; */
    /* } */

    public function insert($client)
    {
        $pdo = database::open();

        $stmt = $pdo->prepare(self::$_insert);

        $stmt->bindParam(':email', $client->get_email());
        $stmt->bindParam(':name', $client->get_name());
        $stmt->bindParam(':mobile', $client->get_mobile());

        $stmt->execute();
        $row_count = $stmt->rowCount();

        database::close();
        return ($row_count > 0);
    }

    public function delete($client_email)
    { 
        $pdo = database::open();

        $stmt = $pdo->prepare(self::$_delete);
        
        $stmt->bindParam(':email', $client_email);
        
        $stmt->execute();

        database::close();
    }

    public function update($new_client)
    {
        $pdo = database::open();

        $stmt = $pdo->prepare(self::$_update);

        $stmt->bindParam(':email', $new_client->get_email());
        $stmt->bindParam(':name', $new_client->get_name());
        $stmt->bindParam(':mobile', $new_client->get_mobile());

        $stmt->execute();
        $row_count = $stmt->rowCount();

        database::close();
        return ($row_count > 0);
    }
}
