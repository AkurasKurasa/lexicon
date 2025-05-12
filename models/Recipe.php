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
            id,
            product_name,
            description,
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
            :description,
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
        // session_start();
        $author = $_SESSION['id'];
        $stmt->execute([
            ':id'               => $data['id'],
            ':name'             => $data['name'],
            ':description'      => $data['description'],
            ':category'         => $data['category'],
            ':ingredients'      => $data['ingredients'],
            ':procedure'        => $data['procedure'],
            ':prep_time'        => $data['prep_time'],
            ':cooking_time'     => $data['cooking_time'],
            ':additional_time'  => $data['additional_time'],
            ':budget'           => $data['budget'],
            ':author'           => $author
        ]);


        $sqlImage = "INSERT INTO images (related_product, image) VALUES (:related_product, :image)";

        $stmtImage = $this->db->prepare($sqlImage);

        return $stmtImage->execute([
            ':related_product'   => $data['id'],
            ':image'        => $data['image']
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
                    WHERE related_product = :id ";
        
        $stmt = $this->db->prepare($sqlImage);
        $resultImg = $stmt->execute([
            ':image' => $data['image'],
            ':id'    => $id
        ]);

    }

    public function fetchRecipe($id)
    {
        $sql = "
                SELECT *
                FROM products
                LEFT JOIN images ON images.related_product = products.id
                WHERE products.id = :id;
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Not working with admin
    // public function fetchRecipe($id)
    // {
    //     $sql = "SELECT *, images.image FROM products 
    //             LEFT JOIN images ON products.id = images.related_product
    //             WHERE products.id = :id";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute([':id' => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    public function fetchAllRecipeDetails($id) {
        $sql = "SELECT products.*, 
                users.id AS user_id, 
                users.first_name, 
                users.last_name, 
                recipe_image.image AS product_image, 
                profile_image.image AS author_image
                FROM products
                JOIN users ON products.author = users.id
                LEFT JOIN images AS recipe_image ON recipe_image.related_product = products.id
                LEFT JOIN images AS profile_image ON profile_image.related_user = users.id
                WHERE products.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);         
    }

    public function fetchRecipeRating($product_id) {
        $sql = "SELECT SUM(pv.rating) AS total_review, COUNT(pv.rating)*5 AS max_review
        FROM product_votes pv
        INNER JOIN product_review_comments prc ON pv.comment_id = prc.id
        WHERE prc.product_id = :product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':product_id' => $product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchCategoryRating() {
        $sql = "SELECT p.category, 
                       SUM(pv.rating) AS total_review, 
                       COUNT(pv.rating) AS num_reviewers,
                       COUNT(pv.rating) * 5 AS max_review
                FROM product_votes pv
                INNER JOIN product_review_comments prc ON pv.comment_id = prc.id
                INNER JOIN products p ON prc.product_id = p.id
                GROUP BY p.category";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}