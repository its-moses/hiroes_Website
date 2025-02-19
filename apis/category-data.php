<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();

if ($_GET['act'] == 'category_table') {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql_list = "SELECT 
    hc.category_name, 
    hc.visibility, hc.id,
    COUNT(hs.id) AS service_count
FROM hiroes_categories AS hc
LEFT JOIN hiroes_services AS hs ON hc.id = hs.category_id
GROUP BY hc.category_name, hc.visibility;";

        $sqlMainQryObj = $dbObj->queryGet($sql_list);

        // console($sqlMainQryObj);

        $dynamic_data = [];

        if ($sqlMainQryObj['numRows'] > 0) {
            foreach ($sqlMainQryObj['data'] as $data) {
                $dynamic_data[] = [
                    "category_name" => $data['category_name'],
                    "visibility" => $data['visibility'] ?? "-",
                    "service_count" => $data['service_count'] ?? "-",
                    "category_id" => $data['id']
                ];
            }

            $res = [
                "status" => true,
                "text" => "Success",
                "msg" => "Category Fetched Successfully",
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