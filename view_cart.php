<?php
include 'includes/db/db.php';
?>
<?php include 'includes/cart_logic.php'; ?>

<?php include 'includes/header.php'; ?>

<body>
   
    <div class="w-screen">

        <?php include 'includes/nav.php'; ?>

        <?php
        if (isset($_SESSION['message'])) {
            unset($_SESSION['message']); // Unset session message after displaying
        }
        ?>
        
        <form class="mt-4" style="display:flex; flex-direction:column-reverse" method="POST" action="">

            <?php include 'templates/view_cart_table.php'; ?>

            <?php
            $total = 0; // Initialize total

            if (!empty($_SESSION['cart'])) {
                // Initialize index outside the loop
                $index = 0;

                // Check and initialize qty_array if not set
                if (!isset($_SESSION['qty_array']) || !is_array($_SESSION['qty_array'])) {
                    $_SESSION['qty_array'] = [];
                }
                
                $cart_count = count($_SESSION['cart']);
                $qty_array_count = count($_SESSION['qty_array']);
                
                // Pad qty_array if cart_count exceeds qty_array_count
                if ($cart_count > $qty_array_count) {
                    $_SESSION['qty_array'] = array_pad($_SESSION['qty_array'], $cart_count, 1);
                }

                // Query products from database based on session cart
                $sql = "SELECT * FROM paintings WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
                $stmt = $pdo->query($sql);

                // Loop through the results and display cart content
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Calculate subtotal for each item and add to total
                    $subtotal = $_SESSION['qty_array'][$index] * $row['price'];
                    $total += $subtotal;

                    ?>

                    <!-- Display each cart item -->
                    <tr>
                        <td class="border border-gray-400">
                            <a href="includes/delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>">
                                <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                            </a>
                        </td>
                        <td class="border border-gray-400">
                            <img src="<?php echo $row['image_url']; ?>" alt="Product Image" class="w-16 h-16 object-cover">
                        </td>
                        <td class="border border-gray-400">
                            <?php echo $row['name']; ?>
                        </td>
                        <td class="border border-gray-400">£<?php echo number_format($row['price'], 2); ?></td>
                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                        <td class="border border-gray-400">
                            <div class="border border-gray-400 inline-block">
                                <input type="text" class="form-control w-12" style="text-align:center" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>">
                            </div>
                        </td>
                        <td class="border border-gray-400">
                            £<?php echo number_format($_SESSION['qty_array'][$index] * $row['price'], 2); ?>
                        </td>
                    </tr>

                    <?php
                    // Increment index for the next item
                    $index++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center border border-gray-400">Your Cart is Empty</td>
                </tr>
                <?php
            }

            // Display Grand Total below the table
            ?>
            <tr>
                <td colspan="5" class="text-right">Grand Total:</td>
                <td>£<?php echo number_format($total, 2); ?></td>
            </tr>

            <!-- Include any view cart buttons or additional content here -->
            <?php include 'templates/view_cart_buttons.php'; ?>

        </form>
        
    </div>

    <script src="setTimeout.js"></script>

</body>
</html>