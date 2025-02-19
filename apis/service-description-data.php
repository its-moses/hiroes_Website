<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();

if ($_GET['act'] == 'description') {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $category_name = $_GET['category_name'];
     
        $sql_list = "SELECT description FROM `hiroes_categories` WHERE category_name = ?";
        $sqlMainQryObj = $dbObj->queryGet($sql_list, [$category_name]);

        $dynamic_data = [];

        if ($sqlMainQryObj['numRows'] > 0) {
            foreach ($sqlMainQryObj['data'] as $data) {
                $dynamic_data[] = [
                    "description" => $data['description'] ?? "-"
                ];
            }

            $res = [
                "status" => true,
                "text" => "Success",
                "msg" => "Description Fetched Successfully",
                "data" => $dynamic_data,
            ];
        } else {
            $res = [
                "status" => false,
                "msg" => "No data found!",
                "sqlMain" => $sqlMainQryObj
            ];
        }

        echo json_encode($res);

    }
}


