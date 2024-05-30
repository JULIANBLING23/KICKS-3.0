<?php

class Database
{
    private $hostname = "localhost";
    private $database = "kicks_db";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    private $port = 3307;

    function connect()
    {
        try {
            $conn = "mysql:host=" . $this->hostname .";port=".$this->port."; dbname=" . $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conn, $this->username, $this->password, $options);

            return $pdo;

        } catch (PDOException $e) {
            echo 'Error de conexión: '.$e;
            exit;
        }
    }
}
