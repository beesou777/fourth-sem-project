<div class="side-navbar position-fixed top-0 left-0">
    <ul class="nav flex-column pt-5">
        <a class="w-100 nav-link d-flex <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home
        </a>
       <a class="w-100 nav-link d-flex <?php echo basename($_SERVER['PHP_SELF']) == 'product.php' ? 'active' : ''; ?>" href="product.php">Products</a>
        <a class="w-100 nav-link d-flex <?php echo basename($_SERVER['PHP_SELF']) == 'order.php' ? 'active' : ''; ?>" href="order.php">Order</a>
    </ul>
</div>
