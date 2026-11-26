<?php
class BookController
{
    public function index()
    {
        $books = (new Book())->getAll();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'books/index.php';
    }

    public function show($id)
    {
        $book = (new Book())->getById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'books/show.php';
    }

    public function create()
    {
        $model = new Book();
        $categories = $model->getCategories();
        $authors = $model->getAuthors();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'books/create.php';
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');
        if ($name === '') {
            header('Location: ' . BASE_URL . '?action=books/create');
            exit;
        }
        $image = '';
        if (!empty($_FILES['image']['name'])) {
            $image = upload_file('books', $_FILES['image']);
        }
        (new Book())->create([
            'name' => $name,
            'price' => (float) ($_POST['price'] ?? 0),
            'quantity' => (int) ($_POST['quantity'] ?? 0),
            'category_id' => (int) ($_POST['category_id'] ?? 0),
            'author_id' => (int) ($_POST['author_id'] ?? 0),
            'image' => $image,
            'status' => (int) ($_POST['status'] ?? 1),
        ]);
        header('Location: ' . BASE_URL . '?action=books');
        exit;
    }

    public function edit($id)
    {
        $model = new Book();
        $book = $model->getById($id);
        $categories = $model->getCategories();
        $authors = $model->getAuthors();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'books/edit.php';
    }

    public function update($id)
    {
        $model = new Book();
        $book = $model->getById($id);
        $image = $book['image'] ?? '';
        if (!empty($_FILES['image']['name'])) {
            $newImage = upload_file('books', $_FILES['image']);
            delete_file($image);
            $image = $newImage;
        }
        $name = trim($_POST['name'] ?? '');
        if ($name !== '') {
            $model->update($id, [
                'name' => $name,
                'price' => (float) ($_POST['price'] ?? 0),
                'quantity' => (int) ($_POST['quantity'] ?? 0),
                'category_id' => (int) ($_POST['category_id'] ?? 0),
                'author_id' => (int) ($_POST['author_id'] ?? 0),
                'image' => $image,
                'status' => (int) ($_POST['status'] ?? 1),
            ]);
        }
        header('Location: ' . BASE_URL . '?action=books');
        exit;
    }

    public function delete($id)
    {
        $model = new Book();
        $book = $model->getById($id);
        $model->delete($id);
        if ($book) {
            delete_file($book['image'] ?? '');
        }
        header('Location: ' . BASE_URL . '?action=books');
        exit;
    }
}
