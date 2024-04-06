<?php
// Include the template file
require_once('component/template.php');

include "db.php";
$con = get_connection();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $product_image = $_POST['product_image'];
    $category = $_POST['category'];

    // Insert the data into the database
    $sql = "INSERT INTO products (name, discount, price, stock, product_image, category) VALUES ('$name', '$discount', '$price', '$stock', '$product_image', '$category')";
    
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<main>
    <div class="row px-5">
        <div class="col-md-6 pr-4 pl-4">
            <form method="post" id="productForm">
                <div class="bg-white my-3 p-3 rounded">
                    <div class="form-group">
                        <label class="py-2 head-5">Product Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="py-2 head-5">Discount Price</label>
                        <input type="number" name="discount" class="form-control">
                    </div>
                </div>

                <div class="bg-white my-3 p-3 rounded">
                    <div class="form-group">
                        <label class="py-2 head-5">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="py-2 head-5">Stock <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pr-4 pl-4">
                <div class="bg-white my-3 p-3 rounded">
                    <h5 class="pb-3 large text-primary">Product Image <span class="text-danger">*</span></h5>
                    <div class="text-center">
                        <input type="text" id="product_image" name="product_image" class="form-control" placeholder="Image URL link" required>
                    </div>
                </div>
                
                <div class="form-group bg-white my-3 p-3 rounded">
                    <label class="py-2 head-5">Category <span class="text-danger">*</span></label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="button-wrapper p-3 bg-white rounded">
                    <input type="submit" name="submit" class="btn btn-primary py-2 rounded-3 w-100" value="Add Product">
                </div>
            </div>
        </form>
    </div>
</main>
