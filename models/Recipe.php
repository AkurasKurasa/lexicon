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
        $generatedId = uniqid('recipe_');

        $sql = "INSERT INTO products (
            id,
            product_name, 
            category, 
            ingredients, 
            procedures, 
            prep_time, 
            cooking_time, 
            additional_time, 
            budget,
            author
        ) VALUES (
            :id,
            :name, 
            :category, 
            :ingredients, 
            :procedure, 
            :prep_time, 
            :cooking_time, 
            :additional_time, 
            :budget,
            :author
        )";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id'               => $generatedId,
            ':name'             => $data['name'],
            ':category'         => $data['category'],
            ':ingredients'      => $data['ingredients'],
            ':procedure'        => $data['procedure'],
            ':prep_time'        => $data['prep_time'],
            ':cooking_time'     => $data['cooking_time'],
            ':additional_time'  => $data['additional_time'],
            ':budget'           => $data['budget'],
            ':author'           => $data['author']
        ]);

        $sqlImage = "INSERT INTO images (related_product, image) VALUES (:related_id, :image)";

        $stmtImage = $this->db->prepare($sqlImage);

        return $stmtImage->execute([
            ':related_id'   => $generatedId,
            ':image'        => $data['image'],  // assuming $data['image'] contains image text/path
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
                    SET image = :image
                    WHERE related_product = :id";
        
        $stmt = $this->db->prepare($sqlImage);

        $resultImg = $stmt->execute([
            ':id'    => $data['id'],
            ':image' => $data['image'],
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