<?php
define('DB_SERVER', 'crud-db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'crud_db');
 
try{
    $connect = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USERNAME, DB_PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}catch (PDOException $e){
    exit("Error: " . $e->getMessage());
}
?>