<h2>Chi tiết danh mục</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= e($category['id']) ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= e($category['name']) ?></td>
    </tr>
</table>
<a class="btn btn-secondary" href="<?= BASE_URL . '?action=categories' ?>">Quay lại</a>