<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    // Nơi điền các đường dẫn của hệ thống
    '/'                 => (new HomeController)->index(),
    'products'          => (new ProductController)->index(),
    'products/create'   => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new ProductController)->store()
        : (new ProductController)->create(),
    'products/show'    => (new ProductController)->show($_GET['id'] ?? null),
    'products/edit'     => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new ProductController)->update($_GET['id'] ?? null)
        : (new ProductController)->edit($_GET['id'] ?? null),
    'products/delete'   => (new ProductController)->delete($_GET['id'] ?? null),
    'categories'        => (new CategoryController)->index(),
    'categories/create' => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new CategoryController)->store()
        : (new CategoryController)->create(),
    'categories/show'   => (new CategoryController)->show($_GET['id'] ?? null),
    'categories/edit'   => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new CategoryController)->update($_GET['id'] ?? null)
        : (new CategoryController)->edit($_GET['id'] ?? null),
    'categories/delete' => (new CategoryController)->delete($_GET['id'] ?? null),
    'authors'           => (new AuthorController)->index(),
    'authors/create'    => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new AuthorController)->store()
        : (new AuthorController)->create(),
    'authors/show'      => (new AuthorController)->show($_GET['id'] ?? null),
    'authors/edit'      => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new AuthorController)->update($_GET['id'] ?? null)
        : (new AuthorController)->edit($_GET['id'] ?? null),
    'authors/delete'    => (new AuthorController)->delete($_GET['id'] ?? null),
    'books'             => (new BookController)->index(),
    'books/create'      => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new BookController)->store()
        : (new BookController)->create(),
    'books/show'        => (new BookController)->show($_GET['id'] ?? null),
    'books/edit'        => $_SERVER['REQUEST_METHOD'] === 'POST'
        ? (new BookController)->update($_GET['id'] ?? null)
        : (new BookController)->edit($_GET['id'] ?? null),
    'books/delete'      => (new BookController)->delete($_GET['id'] ?? null),
};