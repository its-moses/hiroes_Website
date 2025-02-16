<?php
require_once("../hiroes_Website/Config/Database.php");
function loginUser($POST)
{
    $db = new Database(); // Create instance
    $dbCon = $db->getConnection(); // Get mysqli connection
    $returnData = [];

    // SQL Query to check credentials
    $sql = ""; // will write the sql later

    if ($stmt = mysqli_prepare($dbCon, $sql)) {

        
        mysqli_stmt_bind_param($stmt, "s", $POST["username"]);

        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if password matches (not hashed)
            if ($POST["password"] == $row["fldAdminPassword"]) {
                $returnData = [
                    "status" => "success",
                    "message" => "Login successful"
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
                "message" => "Invalid Credentials, Try again...!"
            ];
        }

        mysqli_stmt_close($stmt);
    } else {
        $returnData = [
            "status" => "warning",
            "message" => "Something went wrong, Try again...!"
        ];
    }

    return $returnData;
}
