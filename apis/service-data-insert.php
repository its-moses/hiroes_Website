<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['act'] == 'addService') {
        
        $category_name = $_POST['category_name'];
        $service_description = $_POST['service_description'];
        $price = $_POST['price'];
        $service_name = $_POST['service_name'];

        $sql_category = "SELECT id FROM hiroes_categories WHERE category_name = ?";
        $category_result = $dbObj->queryGet($sql_category, [$category_name]);

        if ($category_result['numRows'] > 0) {
            $category_id = $category_result['data'][0]['id'];

            $sql_insert = "INSERT INTO hiroes_services (service_name, service_description, price, category_id) 
                           VALUES (?, ?, ?, ?)";

            $insert_result = $dbObj->queryInsert($sql_insert, [$service_name, $service_description, $price, $category_id]);

            if ($insert_result['success']) {
                $response = [
                    'status' => 'success',
                    'text' => 'success',
                    'msg' => 'Service added successfully'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'text' => 'error',
                    'msg' => 'Failed to add service'
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'text' => 'error',
                'msg' => 'Category not found'
            ];
        }

        echo json_encode($response);
    }
}

