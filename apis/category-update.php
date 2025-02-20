<?php
require_once("../Config/connect-admin.php");
$headerData = array('Content-Type: application/json');

$dbObj = new Database();

if ($_POST['act'] == 'updateVisibility') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $category_id = $_POST['categoryId'];
        $visibility = $_POST['visibility']; 

        if (!in_array($visibility, ['show', 'hide'])) {
            echo json_encode([
                'status' => 'error',
                'text' => 'error',
                'msg' => 'Invalid visibility status'
            ]);
            exit;
        }

        $sql_update = "UPDATE hiroes_categories SET visibility = ? WHERE id = ?";
        $update_result = $dbObj->queryUpdate($sql_update, [$visibility, $category_id]);

        if ($update_result['success']) {
            $response = [
                'status' => 'success',
                'text' => 'success',
                'msg' => 'Category visibility updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'text' => 'error',
                'msg' => 'Failed to update category visibility'
            ];
        }

        echo json_encode($response);
    }
}
