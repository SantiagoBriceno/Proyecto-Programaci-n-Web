<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Poner su base de datos aqui";

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       
    }catch(PDOException $e){

        die('Conected failed: '. $e->getMessage());
    }
?>