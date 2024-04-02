<?php

$host = 'mysql-145537-0.cloudclusters.net';
$db   = 'CodeTikki';
$user = 'admin';
$pass = 'mzTXCAUe';
$port = "19780";
$charset = 'utf8mb4';


$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
     // echo "Connected successfully";
} catch (\PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}

?>