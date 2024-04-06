<?php
// Include the template file
require_once('component/template.php');

include "db.php";
$con = get_connection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $product_image = $_POST['product_image'];
    $category = $_POST['category'];

    // Update the data in the database
    $sql = "UPDATE products SET name='$name', discount='$discount', price='$price', stock='$stock', product_image='$product_image', category='$category' WHERE id=$id";
    
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: product.php");
    } else {
        echo "Error updating record: " . $con->error;
    }
}

// Fetch product details based on the ID
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$productId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found";
        exit;
    }
} else {
    echo "Product ID not provided";
    exit;
}
?>

<main>
    <div class="row px-5">
        <div class="col-md-6 pr-4 pl-4">
            <form method="post">
                <!-- Hidden input field to store the product ID -->
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

                <div class="bg-white my-3 p-3 rounded">
                    <div class="form-group">
                        <label class="py-2 head-5">Product Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="py-2 head-5">Discount Price</label>
                        <input type="number" name="discount" class="form-control" value="<?php echo $row['discount']; ?>">
                    </div>
                </div>

                <div class="bg-white my-3 p-3 rounded">
                    <div class="form-group">
                        <label class="py-2 head-5">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="py-2 head-5">Stock <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control" value="<?php echo $row['stock']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pr-4 pl-4">
                <div class="bg-white my-3 p-3 rounded">
                    <h5 class="pb-3 large text-primary">Product Image <span class="text-danger">*</span></h5>
                    <div class="text-center">
                        <input type="text" id="product_image" name="product_image" class="form-control" value="<?php echo $row['product_image']; ?>" placeholder="Image URL link" required>
                    </div>
                </div>
                
                <div class="form-group bg-white my-3 p-3 rounded">
                    <label class="py-2 head-5">Category <span class="text-danger">*</span></label>
                    <input type="text" name="category" class="form-control" value="<?php echo $row['category']; ?>" required>
                </div>
                <div class="button-wrapper p-3 bg-white rounded">
                    <input type="submit" name="submit" class="btn btn-primary py-2 rounded-3 w-100" value="Update Product">
                </div>
            </div>
        </form>
    </div>
</main>
