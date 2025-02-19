<?php
class Database
{
    private $dbCon;
    private $host = "localhost";
    private $dbname = "hiroesdb";
    private $user = "root";
    private $pass = "";

    public function __construct()
    {
        $this->dbCon = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->dbCon->connect_error) {
            die("Database dbConection Failed: " . $this->dbCon->connect_error);
        }
    }

    public function queryGet($sql, $params = [])
{
    if (empty($params)) {
        // No parameters, directly execute the query
        $result = $this->dbCon->query($sql);
        if (!$result) {
            return ["success" => false, "message" => $this->dbCon->error];
        }
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return [
            "success" => true,
            "numRows" => $result->num_rows,
            "data" => $data
        ];
    } else {
        // Use prepared statement when parameters are passed
        $stmt = $this->prepareStatement($sql, $params);
        if (!$stmt)
            return ["success" => false, "message" => $this->dbCon->error];

        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return [
            "success" => true,
            "numRows" => $result->num_rows,
            "data" => $data
        ];
    }
}

public function queryInsert($sql, $params = [])
{
    if (empty($params)) {
        // No parameters, directly execute the query
        $result = $this->dbCon->query($sql);
        if (!$result) {
            return ["success" => false, "message" => $this->dbCon->error];
        }
        return [
            "success" => true,
            "insertId" => $this->dbCon->insert_id
        ];
    } else {
        // Use prepared statement when parameters are passed
        $stmt = $this->prepareStatement($sql, $params);
        if (!$stmt)
            return ["success" => false, "message" => $this->dbCon->error];

        return [
            "success" => true,
            "insertId" => $this->dbCon->insert_id
        ];
    }
}

public function queryUpdate($sql, $params = [])
{
    if (empty($params)) {
        // No parameters, directly execute the query
        $result = $this->dbCon->query($sql);
        if (!$result) {
            return ["success" => false, "message" => $this->dbCon->error];
        }
        return ["success" => true];
    } else {
        // Use prepared statement when parameters are passed
        $stmt = $this->prepareStatement($sql, $params);
        if (!$stmt)
            return ["success" => false, "message" => $this->dbCon->error];

        return ["success" => true];
    }
}

public function queryDelete($sql, $params = [])
{
    if (empty($params)) {
        // No parameters, directly execute the query
        $result = $this->dbCon->query($sql);
        if (!$result) {
            return ["success" => false, "message" => $this->dbCon->error];
        }
        return ["success" => true];
    } else {
        // Use prepared statement when parameters are passed
        return $this->queryUpdate($sql, $params);
    }
}


    private function prepareStatement($sql, $params = [])
    {
        $stmt = $this->dbCon->prepare($sql);

        if (!$stmt) {
            return false;
        }

        if (!empty($params) && is_array($params)) {
            $types = str_repeat("s", count($params)); // Assuming all params are strings

            // Ensure count of types matches count of params before binding
            if (count(str_split($types)) === count($params)) {
                $stmt->bind_param($types, ...$params);
            } else {
                error_log("Mismatch between parameters and types in bind_param.");
                return false;
            }
        }

        $stmt->execute();
        return $stmt;
    }

    public function getConnection()
    {
        return $this->dbCon;
    }
    public function __destruct()
    {
        $this->dbCon->close();
    }
}
?>