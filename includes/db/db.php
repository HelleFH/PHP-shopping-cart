<?php
// Connection URL from Heroku environment variable or wherever it's set
$dsn = "pgsql:host=c67okggoj39697.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com;port=5432;dbname=d6ft6ovefh5c8t;user=u3caqsh7sjg974;password=p6d781e204e6c6931b231718965b7d0435add46a942930f6ccd9266a64d8ec304";

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
