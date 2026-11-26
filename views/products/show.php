<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Category Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $productDetail['name']; ?></td>
      <td><?php echo $productDetail['price']; ?></td>
      <td><?php echo $productDetail['quantity']; ?></td>
      <td><img src="<?php echo BASE_ASSETS_UPLOADS . $productDetail['image']; ?>" alt="Product Image" width="50"></td>
      <td><?php echo $productDetail['description']; ?></td>
      <td><?php echo $productDetail['category_name']; ?></td>
      <td><?php echo $productDetail['status'] ? 'Active' : 'Inactive'; ?></td>
    </tr>
  </tbody>
  <div>
    <a href="<?php echo BASE_URL . '?action=products'; ?>">Back to Products</a>
  </div>
</table>