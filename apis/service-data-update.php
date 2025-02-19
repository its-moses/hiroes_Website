<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();




if ($_POST['act'] == 'updateService') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $service_id = $_POST['service_id'];
        $category_name = $_POST['category_name'];
        $service_description = $_POST['service_description'];
        $price = $_POST['price'];
        $service_name = $_POST['service_name'];

        // Fetch the category ID based on category name
        $sql_category = "SELECT id FROM hiroes_categories WHERE category_name = ?";
        $category_result = $dbObj->queryGet($sql_category, [$category_name]);

        if ($category_result['numRows'] > 0) {
            $category_id = $category_result['data'][0]['id'];

            // Update service details
            $sql_update = "UPDATE hiroes_services 
                           SET service_name = ?, service_description = ?, price = ?, category_id = ?
                           WHERE id = ?";
            $update_result = $dbObj->queryUpdate($sql_update, [$service_name, $service_description, $price, $category_id, $service_id]);
            if ($update_result['success']) {
                $response = [
                    'status' => 'success',
                    'text' => 'success',
                    'msg' => 'Service updated successfully'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'text' => 'error',
                    'msg' => 'Failed to update service'
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
