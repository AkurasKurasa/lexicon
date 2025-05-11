<?php

$type = $_POST['type'];

switch ($type) {
    
    case 'category':
        if (isset($_POST['id'])) {
            $id = trim($_POST['id']);
            $redirect = "Recipes.php?category=" . urlencode($id);
            echo json_encode(['success' => true, 'id' => $id, 'redirect_url' => $redirect]);
        } else {
            echo json_encode(['success' => false]);
        }
        break;
    
    case 'dish':

        if (isset($_POST['name'])) {
            $name = trim($_POST['name']);
            $redirect = "Recipe.php?name=" . urlencode($name);
            echo json_encode(['success' => true, 'name' => $name, 'redirect_url' => $redirect]);
        } else {
            $name = trim($_POST['name']);
            echo json_encode(['success' => false, 'name' => $name]);
        }
        break;

    default:
        echo json_encode(['success' => false]);
        break;
}

?>