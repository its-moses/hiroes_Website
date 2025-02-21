<?php
require_once("../Config/connect-admin.php"); // Adjust path as needed


function shortenCategoryKey($category_name) {
    // Convert to PascalCase (Remove dashes & capitalize)
    return preg_replace_callback('/(?:^|-)([a-z])/', function ($matches) {
        return strtoupper($matches[1]);
    }, $category_name) . "Obj";
}

$sql = "SELECT hc.category_name, hs.service_name, hs.service_description, hs.price 
        FROM hiroes_categories hc 
        JOIN hiroes_services hs ON hc.id = hs.category_id
        WHERE hc.visibility = 'show'"; // Fetch only visible categories

$result = $dbObj->queryGet($sql);

if ($result['numRows'] > 0) {
    $servicesData = [];

    foreach ($result['data'] as $row) {
        $categoryKey = shortenCategoryKey($row['category_name']);

        if (!isset($servicesData[$categoryKey])) {
            $servicesData[$categoryKey] = [];
        }

        $servicesData[$categoryKey][] = [
            "service_name" => $row['service_name'],
            "description" => $row['service_description'],
            "price" => $row['price']
        ];
    }

    echo json_encode(["success" => true, "services" => $servicesData]);
} else {
    echo json_encode(["success" => false, "message" => "No services found"]);
}
?>
