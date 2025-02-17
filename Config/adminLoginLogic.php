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

