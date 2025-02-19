<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();


if ($_GET['act'] == 'service_table') {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql_list = "SELECT s.service_name AS service_name, s.status, s.price, s.id, s.service_description , c.category_name 
             FROM hiroes_services s
             JOIN hiroes_categories c ON s.category_id = c.id 
             WHERE 1 
             ORDER BY s.id DESC";

        $sqlMainQryObj = $dbObj->queryGet($sql_list);

        $dynamic_data = [];

        if ($sqlMainQryObj['numRows'] > 0) {
            foreach ($sqlMainQryObj['data'] as $data) {
                $dynamic_data[] = [
                    "service_id" => $data['id'],
                    "service_name" => $data['service_name'] ?? "-",
                    "status" => $data['status'] ?? "-",
                    "price" => $data['price'] ?? "-",
                    "category_name" => $data['category_name'] ?? "-",
                    "service_description" => $data['service_description'] ?? "-"
                ];
            }

            $res = [
                "status" => true,
                "text" => "Success",
                "msg" => "Service Added Successfully",
                "data" => $dynamic_data,
                // "sqlMain" => $sqlMainQryObj['sql']
            ];
        } else {
            $res = [
                "status" => false,
                "msg" => "No data found!",
                "sql" => $sql_list,
                "sqlMain" => $sqlMainQryObj
            ];
        }

        echo json_encode($res);

    }
}





