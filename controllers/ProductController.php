<?php
class ProductController
{
    public function index()
    {
        $product = new Product();
        $products = $product->getAllProducts();
        // var_dump($products);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'products/index.php';
        // echo "Hello from ProductController index method!";
    }
    public function show($id)
    {
        $product = new Product();
        $productDetail = $product->getProductById($id);
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'products/show.php';
    }

    public function create()
    {
        $product = new Product();
        $categories = $product->getCategories();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'products/create.php';
    }

    public function store()
    {
        $product = new Product();
        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $image = upload_file('products', $_FILES['image']);
        }

        $product->createProduct([
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'quantity' => $_POST['quantity'] ?? 0,
            'image' => $image,
            'description' => $_POST['description'] ?? '',
            'status' => (int) ($_POST['status'] ?? 0),
            'category_id' => (int) ($_POST['category_id'] ?? 0),
        ]);

        header('Location: ' . BASE_URL . '?action=products');
        exit;
    }

    public function edit($id)
    {
        $product = new Product();
        $productDetail = $product->getProductById($id);
        $categories = $product->getCategories();
        require_once PATH_VIEW_MAIN;
        require_once PATH_VIEW . 'products/edit.php';
    }

    public function update($id)
    {
        $product = new Product();
        $oldProduct = $product->getProductById($id);
        $image = $oldProduct['image'] ?? '';

        if (!empty($_FILES['image']['name'])) {
            $image = upload_file('products', $_FILES['image']);
        }

        $product->updateProduct($id, [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'quantity' => $_POST['quantity'] ?? 0,
            'image' => $image,
            'description' => $_POST['description'] ?? '',
            'status' => (int) ($_POST['status'] ?? 0),
            'category_id' => (int) ($_POST['category_id'] ?? 0),
        ]);

        header('Location: ' . BASE_URL . '?action=products');
        exit;
    }

    public function delete($id)
    {
        $product = new Product();
        $product->deleteProduct($id);
        header('Location: ' . BASE_URL . '?action=products');
        exit;
    }
}