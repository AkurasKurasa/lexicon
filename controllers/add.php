<?php
    include('../config.php');

    $type = $_GET['type'];

    switch ($type) {

        case 'addRecipeByUser':

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;

        case 'addRecipeByAdmin':

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;


        default:

            echo json_encode(['success' => true, 'content' => $output, 'id' => $id]);
            break;
    }

?>