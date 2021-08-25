<?php

$db_host = "localhost";
$db_root = "root";
$db_pass = "";
$database = "test1";

try {
    $dbh = new PDO("mysql:host=$db_host;dbname=$database", 
                    $db_root, $dbp_password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $event){
  echo "Error". $event->getMessage();
}