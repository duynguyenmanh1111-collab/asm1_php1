<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Quản lý danh mục</h2>
  <a href="<?= BASE_URL . '?action=categories/create' ?>" class="btn btn-success">Thêm danh mục</a>
</div>
<table class="table table-bordered align-middle">
  <thead>
    <tr>
      <th>#</th>
      <th>Tên danh mục</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $i => $category): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= e($category['name']) ?></td>
        <td>
          <a class="btn btn-info btn-sm" href="<?= BASE_URL . '?action=categories/show&id=' . $category['id'] ?>">Xem</a>
          <a class="btn btn-primary btn-sm"
            href="<?= BASE_URL . '?action=categories/edit&id=' . $category['id'] ?>">Sửa</a>
          <a class="btn btn-danger btn-sm" href="<?= BASE_URL . '?action=categories/delete&id=' . $category['id'] ?>"
            onclick="return confirm('Xóa danh mục này?')">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>