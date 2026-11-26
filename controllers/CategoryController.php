<?php
class CategoryController
{
    public function index()
    {
        $categories = (new Category())->getAll();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'categories/index.php';
    }

    public function show($id)
    {
        $category = (new Category())->getById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'categories/show.php';
    }

    public function create()
    {
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'categories/create.php';
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');
        if ($name === '') {
            header('Location: ' . BASE_URL . '?action=categories/create');
            exit;
        }
        (new Category())->create(['name' => $name]);
        header('Location: ' . BASE_URL . '?action=categories');
        exit;
    }

    public function edit($id)
    {
        $category = (new Category())->getById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'categories/edit.php';
    }

    public function update($id)
    {
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            (new Category())->update($id, ['name' => $name]);
        }
        header('Location: ' . BASE_URL . '?action=categories');
        exit;
    }

    public function delete($id)
    {
        (new Category())->delete($id);
        header('Location: ' . BASE_URL . '?action=categories');
        exit;
    }
}
