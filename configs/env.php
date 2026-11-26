<?php

if (PHP_SAPI !== 'cli') {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    define('BASE_URL', $protocol . ($_SERVER['HTTP_HOST'] ?? 'localhost') . $basePath . '/');
} else {
    define('BASE_URL', 'http://localhost/mvc_oop_base-main/');
}

define('PATH_ROOT', __DIR__ . '/../');

define('PATH_VIEW', PATH_ROOT . 'views/');

define('PATH_VIEW_MAIN', PATH_ROOT . 'views/main.php');

define('BASE_ASSETS_UPLOADS', BASE_URL . 'assets/uploads/');

define('PATH_ASSETS_UPLOADS', PATH_ROOT . 'assets/uploads/');

define('PATH_CONTROLLER', PATH_ROOT . 'controllers/');

define('PATH_MODEL', PATH_ROOT . 'models/');

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'quan_ly_sach');
define('DB_OPTIONS', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
