<?php
$servername = "c5flugvup2318r.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com";
$username = "ua7no6ttg991k";
$password = "p4eee94d0aa48027c48a3174b756d1025704bedd4088aac50887be21b1ac4a2c3";
$dbname = "daobrnh15fiqcm";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO attributes as needed
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>