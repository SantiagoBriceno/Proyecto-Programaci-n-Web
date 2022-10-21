<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sitioweb_test_database";

    try{
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       
    }catch(PDOException $e){

        die('Conected failed: '. $e->getMessage());
    }

?>