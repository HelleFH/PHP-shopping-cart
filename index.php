<?php
session_start();
include __DIR__ . '/includes/db/db.php';
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<body>
    <div class="container mx-auto">
        <?php include __DIR__ . '/includes/nav.php'; ?>
        <?php include __DIR__ . '/templates/message.php'; ?>

        <?php 
            // Start timing the database query
            $queryStartTime = microtime(true);

            // Optimize query to fetch only required columns
            $sql = "SELECT id, name, price, image_url FROM paintings";
            $stmt = $pdo->query($sql);

            // Log the time taken for the query
            $queryEndTime = microtime(true);
            error_log("Database query time: " . ($queryEndTime - $queryStartTime) . " seconds");

            // Use a loop to display each painting
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-auto space-x-4 px-6 pt-6 pb-4">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Pass the data to the templates
                $painting = $row;
                include __DIR__ . '/templates/lightbox.php';
                include __DIR__ . '/templates/product.php';
            }
            echo '</div>'; 
        ?>
    </div>
</body>

<script src="public/js/setTimeout.js"></script>
<script src="public/js/lightbox.js"></script>

</html>