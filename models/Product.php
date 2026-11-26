<?php
class Product extends BaseModel
{
    // Thuộc tính 
    public $table = 'products';
    // Phương thứ lấy toàn bộ sản phẩm 
    // Tip nhỏ: Code lệnh vào MYSQL trước
    //  sau đó mới code vào PHP
    public function getAllProducts()
    {
        $sql = "SELECT pr.id, pr.name, pr.price,pr.quantity, pr.image,pr.description, 
        pr.status, COALESCE(ct.name, 'Không phân loại') AS category_name 
        FROM products AS pr LEFT JOIN categories AS ct 
        ON ct.id = pr.category_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getProductById($id)
    {
        $sql = "SELECT pr.id, pr.name, pr.price,pr.quantity, pr.image,pr.description, pr.category_id,
        pr.status, COALESCE(ct.name, 'Không phân loại') AS category_name 
        FROM products AS pr 
        LEFT JOIN categories AS ct 
        ON ct.id = pr.category_id WHERE pr.id = :id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function createProduct($data)
    {
        $sql = "INSERT INTO products (name, price, quantity, image, description, status, category_id) 
                VALUES (:name, :price, :quantity, :image, :description, :status, :category_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':category_id', $data['category_id']);
        return $stmt->execute();
    }

    public function updateProduct($id, $data)
    {
        $sql = "UPDATE products SET name = :name, price = :price, quantity = :quantity,
                image = :image, description = :description, status = :status,
                category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':category_id', $data['category_id']);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getCategories()
    {
        $stmt = $this->conn->query("SELECT id, name FROM categories ORDER BY name");
        return $stmt->fetchAll();
    }
}