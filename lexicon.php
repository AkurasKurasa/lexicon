<?php
include 'config.php';
function countSentiments($text, $positiveFile, $negativeFile) {
    $text = strtolower($text);

    $countMatches = function($wordFile) use ($text) {
        $words = array_filter(array_map('trim', file($wordFile)));
        $total = 0;
        foreach ($words as $word) {
            preg_match_all('/\b' . preg_quote(strtolower($word), '/') . '\b/', $text, $matches);
            $total += count($matches[0]);
        }
        return $total;
    };

    return [
        'positive' => $countMatches($positiveFile),
        'negative' => $countMatches($negativeFile)
    ];
}

function updateBar() {
    function updateCategoryAggregates($pdo) {
        try {
            $pdo->beginTransaction();

            $query = "
                SELECT 
                    p.category,
                    SUM(prc.positive) AS total_positive,
                    SUM(prc.negative) AS total_negative,
                    SUM(prc.positive) - SUM(prc.negative) AS net_positive
                FROM product_review_comments prc
                LEFT JOIN products p ON p.id = prc.product_id
                LEFT JOIN categories c ON c.id = p.category
                GROUP BY p.category
            ";

            $stmt = $pdo->query($query);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $category = $row['category'];
                $total_positive = $row['total_positive'];
                $total_negative = $row['total_negative'];
                $net_positive = $row['net_positive'];

                $checkQuery = "SELECT COUNT(*) FROM categories WHERE category = :category";
                $checkStmt = $pdo->prepare($checkQuery);
                $checkStmt->execute([':category' => $category]);
                $exists = $checkStmt->fetchColumn();

                if ($exists) {
                    $updateQuery = "
                        UPDATE categories
                        SET total_positive = :total_positive, 
                            total_negative = :total_negative, 
                            net_positive = :net_positive
                        WHERE category = :category
                    ";
                    $updateStmt = $pdo->prepare($updateQuery);
                    $updateStmt->execute([
                        'category' => $category,
                        'total_positive' => $total_positive,
                        'total_negative' => $total_negative,
                        'net_positive' => $net_positive
                    ]);
                } else {
                    $insertQuery = "
                        INSERT INTO categories (category, total_positive, total_negative, net_positive)
                        VALUES (:category, :total_positive, :total_negative, :net_positive)
                    ";
                    $insertStmt = $pdo->prepare($insertQuery);
                    $insertStmt->execute([
                        'category' => $category,
                        'total_positive' => $total_positive,
                        'total_negative' => $total_negative,
                        'net_positive' => $net_positive
                    ]);
                }
            }

            $pdo->commit();
            echo "Category aggregates have been successfully updated or inserted.";
        } catch (Exception $e) {
            
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
}

?>