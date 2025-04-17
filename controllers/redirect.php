<?php
if (isset($_POST['id'])) {
    $id = trim($_POST['id']);
    $redirect = "Recipes.php?id=" . urlencode($id);
    echo json_encode(['success' => true, 'id' => $id, 'redirect_url' => $redirect]);
} else {
    echo json_encode(['success' => false]);
}
