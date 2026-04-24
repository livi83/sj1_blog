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
        try {
            $sql = "SELECT c.*, COUNT(cp.post_id) AS posts_count 
                    FROM categories c 
                    LEFT JOIN post_category cp ON c.id = cp.category_id 
                    GROUP BY c.id";

            $stmt = $this->db->query($sql);

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            Helper::log("Category::all ERROR: " . $e->getMessage(), 'ERROR');
            return [];
        }
    }

    public function find(int $id): object|false
    {
        try {
            $sql = "SELECT * FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'id' => $id
            ]);

            return $stmt->fetch();

        } catch (PDOException $e) {
            Helper::log("Category::find ERROR: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }

    public function create(string $name, string $slug, string $description): bool
    {
        try {
            $sql = "INSERT INTO categories (name, slug, description)
                    VALUES (:name, :slug, :description)";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                'name' => $name,
                'slug' => $slug,
                'description' => $description
            ]);

        } catch (PDOException $e) {
            Helper::log("Category::create ERROR: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }

    public function update(int $id, string $name, string $slug, string $description): bool
    {
        try {
            $sql = "UPDATE categories
                    SET name = :name,
                        slug = :slug,
                        description = :description
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                'id' => $id,
                'name' => $name,
                'slug' => $slug,
                'description' => $description
            ]);

        } catch (PDOException $e) {
            Helper::log("Category::update ERROR: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                'id' => $id
            ]);

        } catch (PDOException $e) {
            Helper::log("Category::delete ERROR: " . $e->getMessage(), 'ERROR');
            return false;
        }
    }
}