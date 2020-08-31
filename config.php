<?php
define("DBNAME", "login_system");
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");

$msg = null;

try {
    //creating database
    $settings = new PDO("mysql:charset=utf8mb4;host=" . DBHOST, DBUSER, DBPASS);
    $settings->exec("CREATE DATABASE IF NOT EXISTS login_system");

    $conn = new PDO("mysql:charset=utf8mb4;host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //creating table
    $c_sql = $conn->prepare("CREATE TABLE IF NOT EXISTS users(
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(255),
        last_name VARCHAR(255),
        username VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255)
        )");
    $c_exe = $c_sql->execute();
    if (!$c_exe) {
        throw new LogicException("Error creating table");
    }
} catch (PDOException $ex) {
    echo 'Exception' . $ex->getMessage();
}
