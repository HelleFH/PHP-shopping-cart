<?php
$host = 'dpg-cpnujd6ehbks738e1pmg-a.oregon-postgres.render.com';
$database = 'render_postgres_x399';
$user = 'render_postgres_x399_user';
$password = 'giIeg82cPpiHrSQgjiBViF2olC30BUyQ'; // Replace with your actual password

try {
    $dsn = "pgsql:host=$host;dbname=$database;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Proceed with your SQL queries here

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
