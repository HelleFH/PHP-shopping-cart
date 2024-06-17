<?php
$connection_string = "postgres://render_postgres_x399_user:giIeg82cPpiHrSQgjiBViF2olC30BUyQ@dpg-cpnujd6ehbks738e1pmg-a.oregon-postgres.render.com/render_postgres_x399";

try {
    $pdo = new PDO($connection_string);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Proceed with your SQL queries here
    $sql = "SELECT * FROM your_table";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Process each row
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>