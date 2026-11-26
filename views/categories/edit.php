<h2>Sửa danh mục</h2>
<form method="post" action="<?= BASE_URL . '?action=categories/edit&id=' . $category['id'] ?>">
  <div class="mb-3"><label class="form-label">Tên danh mục</label><input class="form-control" name="name"
      value="<?= e($category['name']) ?>" required></div>
  <button class="btn btn-primary">Cập nhật</button>
  <a class="btn btn-secondary" href="<?= BASE_URL . '?action=categories' ?>">Quay lại</a>
</form>