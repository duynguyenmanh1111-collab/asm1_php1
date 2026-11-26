<?php
class Book extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT b.*, c.name AS category_name, a.name AS author_name
                FROM books b
                LEFT JOIN categories c ON c.id = b.category_id
                LEFT JOIN authors a ON a.id = b.author_id
                ORDER BY b.id DESC";
        return $this->conn->query($sql)->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT b.*, c.name AS category_name, a.name AS author_name
                FROM books b
                LEFT JOIN categories c ON c.id = b.category_id
                LEFT JOIN authors a ON a.id = b.author_id
                WHERE b.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO books (name, price, quantity, category_id, author_id, image, status)
                VALUES (:name, :price, :quantity, :category_id, :author_id, :image, :status)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE books SET name = :name, price = :price, quantity = :quantity,
                category_id = :category_id, author_id = :author_id, image = :image, status = :status
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getCategories()
    {
        return $this->conn->query("SELECT id, name FROM categories ORDER BY name")->fetchAll();
    }

    public function getAuthors()
    {
        return $this->conn->query("SELECT id, name FROM authors ORDER BY name")->fetchAll();
    }
}
