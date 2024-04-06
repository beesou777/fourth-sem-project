<?php
// Include the template file
require_once('component/template.php');
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
      <th scope="col">Item Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Discount</th>
      <th scope="col">stock</th>
      <th scope="col">isactive</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@twitter</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@fat</td>
      <td>@twitter</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
</main>