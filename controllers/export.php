<?php

    session_start();

    include('../config.php');
    require_once '../models/Recipe.php';
    require_once '../models/User.php';
    require_once '../models/Log.php';

    $type = $_GET['type'];

    switch ($type) {

        case 'exportRecipes':
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="products_export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Fetch column names
            $columnsQuery = $pdo->query("SHOW COLUMNS FROM products");
            $columns = $columnsQuery->fetchAll(PDO::FETCH_COLUMN);
            fputcsv($output, $columns); // Write header

            // Fetch table data
            $stmt = $pdo->query("SELECT * FROM products");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, $row);
            }

            fclose($output);
            exit;

            echo json_encode(['success' => true]);
            break;

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

        case 'exportReviews':

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="product_review_comments_export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Fetch column names
            $columnsQuery = $pdo->query("SHOW COLUMNS FROM product_review_comments");
            $columns = $columnsQuery->fetchAll(PDO::FETCH_COLUMN);
            fputcsv($output, $columns); // Write header

            // Fetch table data
            $stmt = $pdo->query("SELECT * FROM product_review_comments");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, $row);
            }

            fclose($output);
            exit;


            echo json_encode(['success' => true]);
            break;

        case 'exportLogs':

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="activity_logs_export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Fetch column names
            $columnsQuery = $pdo->query("SHOW COLUMNS FROM activity_logs");
            $columns = $columnsQuery->fetchAll(PDO::FETCH_COLUMN);
            fputcsv($output, $columns); // Write header

            // Fetch table data
            $stmt = $pdo->query("SELECT * FROM activity_logs");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                fputcsv($output, $row);
            }

            fclose($output);
            exit;

            echo json_encode(['success' => true]);
            break;

        case 'exportAll':
            
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="all_data_export.csv"');

            // Tables to export
            $tables = [
                'products',
                'users',
                'product_review_comments',
                'activity_logs'
            ];

            // Open output stream
            $output = fopen('php://output', 'w');

            foreach ($tables as $table) {
                // Write table name as a section header
                fputcsv($output, ["===== Table: $table ====="]);

                // Fetch column names
                $columnsQuery = $pdo->query("SHOW COLUMNS FROM $table");
                $columns = $columnsQuery->fetchAll(PDO::FETCH_COLUMN);
                fputcsv($output, $columns);

                // Fetch table data
                $stmt = $pdo->query("SELECT * FROM $table");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    fputcsv($output, $row);
                }

                // Add an empty line between tables
                fputcsv($output, []);
            }

            fclose($output);
            exit;

        default:
            echo json_encode(['success' => true]);
            break;
        
    }

?>