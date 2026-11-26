<h2>Sửa sách</h2>
<form method="post" enctype="multipart/form-data" action="<?= BASE_URL . '?action=books/edit&id=' . $book['id'] ?>">
  <div class="row">
    <div class="col-md-6 mb-3"><label class="form-label">Tên sách</label><input class="form-control" name="name"
        value="<?= e($book['name']) ?>" required></div>
    <div class="col-md-3 mb-3"><label class="form-label">Giá</label><input class="form-control" name="price"
        type="number" min="0" step="0.01" value="<?= e($book['price']) ?>"></div>
    <div class="col-md-3 mb-3"><label class="form-label">Số lượng</label><input class="form-control" name="quantity"
        type="number" min="0" value="<?= e($book['quantity']) ?>"></div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3"><label class="form-label">Danh mục</label><select class="form-control"
        name="category_id"><?php foreach ($categories as $category): ?>
          <option value="<?= $category['id'] ?>" <?= $category['id'] == $book['category_id'] ? 'selected' : '' ?>>
            <?= e($category['name']) ?>
          </option><?php endforeach; ?>
      </select></div>
    <div class="col-md-6 mb-3"><label class="form-label">Tác giả</label><select class="form-control"
        name="author_id"><?php foreach ($authors as $author): ?>
          <option value="<?= $author['id'] ?>" <?= $author['id'] == $book['author_id'] ? 'selected' : '' ?>>
            <?= e($author['name']) ?>
          </option><?php endforeach; ?>
      </select></div>
  </div>
  <?php if (!empty($book['image'])): ?>
    <div class="mb-2"><img src="<?= BASE_ASSETS_UPLOADS . e($book['image']) ?>" width="120"></div><?php endif; ?>
  <div class="mb-3"><label class="form-label">Thay ảnh bìa</label><input class="form-control" type="file" name="image"
      accept="image/jpeg,image/png,image/gif,image/webp"></div>
  <div class="mb-3"><label class="form-label">Trạng thái</label><select class="form-control" name="status">
      <option value="1" <?= $book['status'] ? 'selected' : '' ?>>Hiện</option>
      <option value="0" <?= !$book['status'] ? 'selected' : '' ?>>Ẩn</option>
    </select></div>
  <button class="btn btn-primary">Cập nhật</button><a class="btn btn-secondary"
    href="<?= BASE_URL . '?action=books' ?>">Quay lại</a>
</form>