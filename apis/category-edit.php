<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();

if ($_GET['act'] == 'edit_visibility' && isset($_GET['id'])) {
    $category_id = intval($_GET['id']); // Sanitize input
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql_list = "SELECT 
                category_name, 
                visibility , description 
            FROM hiroes_categories WHERE id = $category_id";

        $sqlMainQryObj = $dbObj->queryGet($sql_list);

        // console($sqlMainQryObj);

        $dynamic_data = [];

        if ($sqlMainQryObj['numRows'] > 0) {
            foreach ($sqlMainQryObj['data'] as $data) {
                $dynamic_data[] = [
                    "category_name" => $data['category_name'],
                    "visibility" => $data['visibility'] ?? "-",
                    "category_description" => $data['description']
                ];
            }

            $res = [
                "status" => true,
                "text" => "Success",
                "msg" => "Category Visibility Successfully",
                "data" => $dynamic_data,
            ];
        } else {
            $res = [
                "status" => false,
                "msg" => "No data found!",
                "sql" => $sql_list
            ];
        }

        echo json_encode($res);

    }
}