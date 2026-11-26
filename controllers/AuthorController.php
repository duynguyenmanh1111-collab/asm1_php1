<?php
class AuthorController
{
    public function index()
    {
        $authors = (new Author())->getAll();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'authors/index.php';
    }

    public function show($id)
    {
        $author = (new Author())->getById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'authors/show.php';
    }

    public function create()
    {
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'authors/create.php';
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');
        if ($name === '') {
            header('Location: ' . BASE_URL . '?action=authors/create');
            exit;
        }
        $image = '';
        if (!empty($_FILES['image_author']['name'])) {
            $image = upload_file('authors', $_FILES['image_author']);
        }
        (new Author())->create([
            'name' => $name,
            'pen_name' => trim($_POST['pen_name'] ?? ''),
            'image_author' => $image,
        ]);
        header('Location: ' . BASE_URL . '?action=authors');
        exit;
    }

    public function edit($id)
    {
        $author = (new Author())->getById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'authors/edit.php';
    }

    public function update($id)
    {
        $model = new Author();
        $author = $model->getById($id);
        $image = $author['image_author'] ?? '';
        if (!empty($_FILES['image_author']['name'])) {
            $newImage = upload_file('authors', $_FILES['image_author']);
            delete_file($image);
            $image = $newImage;
        }
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            $model->update($id, [
                'name' => $name,
                'pen_name' => trim($_POST['pen_name'] ?? ''),
                'image_author' => $image,
            ]);
        }
        header('Location: ' . BASE_URL . '?action=authors');
        exit;
    }

    public function delete($id)
    {
        $model = new Author();
        $author = $model->getById($id);
        $model->delete($id);
        if ($author) {
            delete_file($author['image_author'] ?? '');
        }
        header('Location: ' . BASE_URL . '?action=authors');
        exit;
    }
}
