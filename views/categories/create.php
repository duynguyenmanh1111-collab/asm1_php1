<h2>Thêm danh mục</h2>
<form method="post" action="<?= BASE_URL . '?action=categories/create' ?>">
  <div class="mb-3"><label class="form-label">Tên danh mục</label><input class="form-control" name="name" required></div>
  <button class="btn btn-success">Lưu</button>
  <a class="btn btn-secondary" href="<?= BASE_URL . '?action=categories' ?>">Quay lại</a>
</form>
