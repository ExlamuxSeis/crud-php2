<?php

class conexion
{
    public static function dbconexion()
    {
        try {
            return $conn = new PDO('mysql:host=localhost;dbname=modal', 'root', 'asdfg12345');
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }
}
