<?php
// Connection URL from Heroku environment variable or wherever it's set
$dsn = "pgsql:host=c8lj070d5ubs83.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com;port=5432;dbname=d67sgvu0glgh9h;user=u5dul0ragmt3ld;password=pbf4e9e4739e8e21661d2b1236d1d8e7c9fdf1317059315805ab445ddd5ca1cae";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn);

    // Set PDO attributes as needed
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Now $pdo is ready to use for interacting with the database

    // Example: Querying data
    $stmt = $pdo->query('SELECT * FROM paintings');
    while ($row = $stmt->fetch()) {
    }

} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
