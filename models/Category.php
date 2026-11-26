<?php
class Category extends BaseModel
{
    public function getAll()
    {
        return $this->conn->query("SELECT * FROM categories ORDER BY id DESC")->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO categories (name) VALUES (:name)");
        return $stmt->execute(['name' => $data['name']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE categories SET name = :name WHERE id = :id");
        return $stmt->execute(['name' => $data['name'], 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM categories WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
