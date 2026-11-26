<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Home</b></a>
            </li>
            <li class="nav-item"><a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=categories' ?>"><b>Danh mục</b></a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=authors' ?>"><b>Tác giả</b></a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=books' ?>"><b>Sách</b></a></li>
        </ul>
    </nav>

    <main class="container py-4">
        <?php
        if (isset($contentView) && is_readable($contentView)) {
            require_once $contentView;
        }
        ?>
    </main>

</body>

</html>