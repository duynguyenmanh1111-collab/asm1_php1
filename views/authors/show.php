<h2>Chi tiết tác giả</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= e($author['id']) ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= e($author['name']) ?></td>
    </tr>
    <tr>
        <th>Bút danh</th>
        <td><?= e($author['pen_name']) ?></td>
    </tr>
    <tr>
        <th>Ảnh</th>
        <td><?php if (!empty($author['image_author'])): ?><img
                    src="<?= BASE_ASSETS_UPLOADS . e($author['image_author']) ?>" width="180"><?php endif; ?></td>
    </tr>
</table>
<a class="btn btn-secondary" href="<?= BASE_URL . '?action=authors' ?>">Quay lại</a>