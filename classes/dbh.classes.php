<?php

class Dbh
{
    protected function connect()
    {
        try {
            $dsn = 'mysql:host=127.0.0.1;dbname=dbpetra';
            $username = "root";
            $password = "";
            $dbh = new PDO($dsn, $username, $password);
            return $dbh;
        }
        catch (PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();

        }
    }

}