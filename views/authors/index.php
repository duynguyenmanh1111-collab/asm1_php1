<div class="d-flex justify-content-between align-items-center mb-3"><h2>Quản lý tác giả</h2><a href="<?= BASE_URL . '?action=authors/create' ?>" class="btn btn-success">Thêm tác giả</a></div>
<table class="table table-bordered align-middle">
  <thead><tr><th>#</th><th>Tên</th><th>Bút danh</th><th>Ảnh</th><th>Thao tác</th></tr></thead>
  <tbody><?php foreach ($authors as $i => $author): ?>
    <tr><td><?= $i + 1 ?></td><td><?= e($author['name']) ?></td><td><?= e($author['pen_name']) ?></td>
      <td><?php if (!empty($author['image_author'])): ?><img src="<?= BASE_ASSETS_UPLOADS . e($author['image_author']) ?>" width="70" alt="Ảnh tác giả"><?php endif; ?></td>
      <td><a class="btn btn-info btn-sm" href="<?= BASE_URL . '?action=authors/show&id=' . $author['id'] ?>">Xem</a> <a class="btn btn-primary btn-sm" href="<?= BASE_URL . '?action=authors/edit&id=' . $author['id'] ?>">Sửa</a> <a class="btn btn-danger btn-sm" href="<?= BASE_URL . '?action=authors/delete&id=' . $author['id'] ?>" onclick="return confirm('Xóa tác giả này và ảnh của họ?')">Xóa</a></td>
    </tr><?php endforeach; ?></tbody>
</table>
