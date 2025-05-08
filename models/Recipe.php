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

        $sql = "INSERT INTO products (
            product_name, 
            category, 
            ingredients, 
            procedures, 
            prep_time, 
            cooking_time, 
            additional_time, 
            budget
        ) VALUES (
            :name, 
            :category, 
            :ingredients, 
            :procedure, 
            :prep_time, 
            :cooking_time, 
            :additional_time, 
            :budget
        )";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':name'             => $data['name'],
            ':category'         => $data['category'],
            ':ingredients'      => $data['ingredients'],
            ':procedure'        => $data['procedure'],
            ':prep_time'        => $data['prep_time'],
            ':cooking_time'     => $data['cooking_time'],
            ':additional_time'  => $data['additional_time'],
            ':budget'           => $data['budget']
        ]);

        $productId = $this->db->lastInsertId();

        $sqlImage = "INSERT INTO images (related_id, image, related_type) VALUES (:related_id, :image, :related_type)";

        $stmtImage = $this->db->prepare($sqlImage);

        return $stmtImage->execute([
            ':related_id'   => $productId,
            ':image'        => $data['image'],  // assuming $data['image'] contains image text/path
            ':related_type' => "product"
        ]);

    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE products 
                SET product_name = :name, 
                    description = :description, 
                    category = :category, 
                    ingredients = :ingredients, 
                    procedures = :procedure, 
                    prep_time = :prep_time, 
                    cooking_time = :cooking_time, 
                    additional_time = :additional_time, 
                    budget = :budget 
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute([
            ':name'            => $data['name'],
            ':description'     => $data['description'],
            ':category'        => $data['category'],
            ':ingredients'     => $data['ingredients'],
            ':procedure'       => $data['procedure'],
            ':prep_time'       => $data['prep_time'],
            ':cooking_time'    => $data['cooking_time'],
            ':additional_time' => $data['additional_time'],
            ':budget'          => $data['budget'],
            ':id'              => $id
        ]);

        $sqlImage = "UPDATE images
                    SET image = :image,
                        related_type = :type   
                    WHERE related_id = :id 
                    ";
        
        $stmt = $this->db->prepare($sqlImage);

        $resultImg = $stmt->execute([
            ':id'    => $data['id'],
            ':image' => $data['image'],
            ':type'  => "product"
        ]);

    }

    public function fetchRecipe($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}