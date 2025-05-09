<?php

    session_start();

    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';
    require_once '../models/Log.php';

    $type = $_GET['type'];

    switch ($type) {

        case 'exportUsers':

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="users_export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Fetch column names
            $columnsQuery = $pdo->query("SHOW COLUMNS FROM users");
            $columns = $columnsQuery->fetchAll(PDO::FETCH_COLUMN);
            fputcsv($output, $columns); // Write header

            // Fetch table data
            $stmt = $pdo->query("SELECT * FROM users");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, $row);
            }

            fclose($output);
            exit;

            echo json_encode(['success' => true]);
            break;

        case 'addRecipeByAdmin':

            echo json_encode(['success' => true]);
            break;

        case 'addUserByAdmin':

            echo json_encode(['success' => true]);
            break;

        default:
            echo json_encode(['success' => true]);
            break;
        
    }

?>