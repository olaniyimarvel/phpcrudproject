<?php 
 date_default_timezone_set("Africa/Lagos");
    $_SESSION['appid']=5;
    $_SESSION['menuid']=2;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentinfo";


    $dsn = "mysql:host=$servername;dbname=$dbname";
    try {
        // create database connection
        $conn = new PDO($dsn, $username, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    } catch (PDOException $e) {
        // echo $e->getMessage();
        echo $e->getMessage();
        die();
    }

  
?>