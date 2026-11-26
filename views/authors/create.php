<h2>Thêm tác giả</h2>
<form method="post" enctype="multipart/form-data" action="<?= BASE_URL . '?action=authors/create' ?>">
  <div class="mb-3"><label class="form-label">Tên tác giả</label><input class="form-control" name="name" required></div>
  <div class="mb-3"><label class="form-label">Bút danh</label><input class="form-control" name="pen_name"></div>
  <div class="mb-3"><label class="form-label">Ảnh tác giả</label><input class="form-control" type="file"
      name="image_author" accept="image/jpeg,image/png,image/gif,image/webp"></div>
  <button class="btn btn-success">Lưu</button><a class="btn btn-secondary"
    href="<?= BASE_URL . '?action=authors' ?>">Quay lại</a>
</form>