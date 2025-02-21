<?php
require_once("../Config/connect-admin.php"); // Adjust path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    $sql = "SELECT visibility FROM hiroes_categories WHERE category_name = ?";
    $result = $dbObj->queryGet($sql, [$category_name]);

    if ($result['numRows'] > 0) {
        echo json_encode([
            "success" => true,
            "visibility" => $result['data'][0]['visibility']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Category not found"]);
    }
}
?>
