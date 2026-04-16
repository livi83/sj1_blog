<?php

class Category
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function all(): array
    {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }
}