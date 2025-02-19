<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();

if ($_GET['act'] == 'edit_service' && isset($_GET['id'])) {
    $service_id = intval($_GET['id']); // Sanitize input

    $sql = "SELECT s.id AS service_id, s.service_name, s.status, s.price, 
                   s.service_description, c.category_name, c.description AS category_description
            FROM hiroes_services s
            JOIN hiroes_categories c ON s.category_id = c.id
            WHERE s.id = ?";

    $params = [$service_id];
    $sqlMainQryObj = $dbObj->queryGet($sql, $params);

    if ($sqlMainQryObj['numRows'] > 0) {
        $data = $sqlMainQryObj['data'][0]; // Fetch first row

        $response = [
            "status" => true,
            "data" => [
                "service_id" => $data['service_id'],
                "service_name" => $data['service_name'] ?? "-",
                "status" => $data['status'] ?? "-",
                "price" => $data['price'] ?? "-",
                "category_name" => $data['category_name'] ?? "-",
                "category_description" => $data['category_description'] ?? "-",
                "service_description" => $data['service_description'] ?? "-"
            ]
        ];
    } else {
        $response = [
            "status" => false,
            "message" => "Service not found."
        ];
    }

    echo json_encode($response);
}

if ($_GET['act'] == 'check_service_name'&& isset($_GET['service_name'])) {
    $service_name = trim($_GET['service_name']);

    $sql = "SELECT COUNT(*) AS count FROM hiroes_services WHERE service_name = ?";
    $params = [$service_name];
    $sqlMainQryObj = $dbObj->queryGet($sql, $params);

    $exists = ($sqlMainQryObj['data'][0]['count'] > 0);

    echo json_encode(["exists" => $exists]);
}
