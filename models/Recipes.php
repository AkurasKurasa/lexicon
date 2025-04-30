<?php
class Recipe
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $sql = "INSERT INTO products (product_name, description, category)
                VALUES (:name, :description, :category)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':description'  => $data['descripion'],
            ':category'     => $data['category']
        ]);

    }
}