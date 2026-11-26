<a href="<?= BASE_URL . '?action=products/create' ?>" class="btn btn-success">Add Product</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Category Name</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $index => $product): ?>
      <tr>
        <th scope="row"><?php echo $index + 1; ?></th>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td><?php echo $product['quantity']; ?></td>
        <td><img src="<?php echo BASE_ASSETS_UPLOADS . $product['image']; ?>" alt="Product Image" width="50"></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['category_name']; ?></td>
        <td><?php echo $product['status'] ? 'Active' : 'Inactive'; ?></td>
        <td>
          <a href="<?= BASE_URL . '?action=products/edit&id=' . $product['id'] ?>" class="btn btn-primary">Edit</a>
          <a href="<?= BASE_URL . '?action=products/delete&id=' . $product['id'] ?>" class="btn btn-danger">Delete</a>
          <a href="<?= BASE_URL . '?action=products/show&id=' . $product['id'] ?>" class="btn btn-info">View</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>