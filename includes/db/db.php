<?php
$servername = "c8lj070d5ubs83.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com";
$username = "u5dul0ragmt3ld";
$password = "pbf4e9e4739e8e21661d2b1236d1d8e7c9fdf1317059315805ab445ddd5ca1cae";
$dbname = "d67sgvu0glgh9h";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO attributes as needed
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());

    
}
?>