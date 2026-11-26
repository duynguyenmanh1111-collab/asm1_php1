<?php
class Author extends BaseModel
{
    public function getAll()
    {
        return $this->conn->query("SELECT * FROM authors ORDER BY id DESC")->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM authors WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO authors (name, pen_name, image_author) VALUES (:name, :pen_name, :image_author)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE authors SET name = :name, pen_name = :pen_name, image_author = :image_author WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM authors WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
