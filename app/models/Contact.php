<?php
class Contact
{
    private PDO $db;
    private string $name;
    private string $email;
    private string $message;

    public function __construct(PDO $db, array $data)
    {
        $this->db = $db;
        $this->name = trim($data['name'] ?? '');
        $this->email = trim($data['email'] ?? '');
        $this->message = trim($data['message'] ?? '');
    }

    public function store(): bool
    {
        // validácia
        if ($this->name === '' || $this->email === '' || $this->message === '') {
            echo "Vyplň všetky polia!";
            return false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "Email nemá správny formát!";
            return false;
        }

        $sql = "INSERT INTO contacts (name, email, message)
                VALUES (:name, :email, :message)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ]);
    }
}