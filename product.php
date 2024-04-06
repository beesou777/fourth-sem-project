<?php
// Include the template file
require_once('component/template.php');

// Include database connection
include "db.php";

// Check if the form is submitted for product deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    // Get the product ID to be deleted
    $productId = $_POST['product_id'];

    // Prepare and execute the delete query
    $deleteSql = "DELETE FROM products WHERE id = $productId";
    if ($con->query($deleteSql) === TRUE) {
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting product');</script>";
    }
}

// Fetch data from the database
$sql = "SELECT * FROM products";
$result = $con->query($sql);
?>

<!-- Product Page Content -->
<main>
    <?php include "component/TopNavbar.php" ?>
    <div class="container-max px-4">
        <h2>Our Products</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">product Image</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['product_image']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['discount']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td class="d-flex gap-2">
                                <a href="productEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    // If no rows returned, display a message
                    echo "<tr><td colspan='8'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
