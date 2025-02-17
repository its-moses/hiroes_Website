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

    public function queryInsert($sql, $params = [])
    {
        $stmt = $this->prepareStatement($sql, $params);
        if (!$stmt)
            return ["success" => false, "message" => $this->dbCon->error];

        return [
            "success" => true,
            "insertId" => $this->dbCon->insert_id
        ];
    }

    public function queryUpdate($sql, $params = [])
    {
        $stmt = $this->prepareStatement($sql, $params);
        if (!$stmt)
            return ["success" => false, "message" => $this->dbCon->error];

        return ["success" => true];
    }

    public function queryDelete($sql, $params = [])
    {
        return $this->queryUpdate($sql, $params);
    }

    private function prepareStatement($sql, $params)
    {
        $stmt = $this->dbCon->prepare($sql);
        if (!$stmt)
            return false;

        if (!empty($params)) {
            $types = str_repeat("s", count($params)); // Assuming all params are strings
            $stmt->bind_param($types, ...$params);
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