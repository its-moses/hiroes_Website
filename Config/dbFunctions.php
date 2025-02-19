<?php
require_once("../hiroes_Website/Config/Database.php");
function loginUser($POST)
{
    $db = new Database(); // Create instance
    $dbCon = $db->getConnection(); // Get mysqli connection
    $returnData = [];

    $sql = "SELECT * FROM admin_table WHERE admin_user = ?";

    if ($stmt = mysqli_prepare($dbCon, $sql)) {

        $username = trim($POST["username"]);

        mysqli_stmt_bind_param($stmt, "s", $username);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) { // Fetch user row

            if ($POST["password"] == $row["admin_pass"]) {
                $returnData = [
                    "status" => "success",
                    "message" => "Login successful",
                ];
            } else {
                $returnData = [
                    "status" => "warning",
                    "message" => "Invalid Password, Try again...!"
                ];
            }

        } else {
            $returnData = [
                "status" => "warning",
                "message" => "Invalid Credentials, Try again...!",
                "sql" => $sql
            ];
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        $returnData = [
            "status" => "error",
            "message" => "Something went wrong, Try again...!"
        ];
    }

    return $returnData;
}


function serviceInsert($POST)
{
    $db = new Database(); // Create instance
    $dbCon = $db->getConnection(); // Get mysqli connection
    $returnData = [];

    $sql = "SELECT id FROM hiroes_categories WHERE category_name = ?";

    if ($stmt = mysqli_prepare($dbCon, $sql)) {
        $categoryName = trim($POST["category_name"]);

        mysqli_stmt_bind_param($stmt, "s", $categoryName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) { 
            $category_id = $row["id"];

            $insertSql = "INSERT INTO hiroes_services (name, category_id, status) VALUES (?, ?, ?)";

            if ($insertStmt = mysqli_prepare($dbCon, $insertSql)) {
                $serviceName = trim($POST["service_name"]);
                $status = trim($POST["status"]); 

                mysqli_stmt_bind_param($insertStmt, "sis", $serviceName, $category_id, $status);
                mysqli_stmt_execute($insertStmt);

                if (mysqli_stmt_affected_rows($insertStmt) > 0) {
                    $returnData = [
                        "status" => "success",
                        "message" => "Service added successfully!"
                    ];
                } else {
                    $returnData = [
                        "status" => "error",
                        "message" => "Failed to insert service!"
                    ];
                }

                mysqli_stmt_close($insertStmt);
            }
        } else {
            $returnData = [
                "status" => "warning",
                "message" => "Category not found!"
            ];
        }

        mysqli_stmt_close($stmt);
    } else {
        $returnData = [
            "status" => "error",
            "message" => "Something went wrong, Try again...!"
        ];
    }

    return $returnData;
}

