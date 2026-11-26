<h2>Sửa tác giả</h2>
<form method="post" enctype="multipart/form-data" action="<?= BASE_URL . '?action=authors/edit&id=' . $author['id'] ?>">
  <div class="mb-3"><label class="form-label">Tên tác giả</label><input class="form-control" name="name"
      value="<?= e($author['name']) ?>" required></div>
  <div class="mb-3"><label class="form-label">Bút danh</label><input class="form-control" name="pen_name"
      value="<?= e($author['pen_name']) ?>"></div>
  <?php if (!empty($author['image_author'])): ?>
    <div class="mb-2"><img src="<?= BASE_ASSETS_UPLOADS . e($author['image_author']) ?>" width="120" alt="Ảnh hiện tại">
    </div><?php endif; ?>
  <div class="mb-3"><label class="form-label">Thay ảnh tác giả</label><input class="form-control" type="file"
      name="image_author" accept="image/jpeg,image/png,image/gif,image/webp"></div>
  <button class="btn btn-primary">Cập nhật</button><a class="btn btn-secondary"
    href="<?= BASE_URL . '?action=authors' ?>">Quay lại</a>
</form>