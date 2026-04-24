<?php

class ContactForm
{
    private string $name;
    private string $email;
    private string $message;

    public function __construct(string $name, string $email, string $message)
    {
        $this->name = trim($name);
        $this->email = trim($email);
        $this->message = trim($message);
    }

    public function send(string $filePath): void
    {
        // jednoduchá validácia
        if ($this->name === '' || $this->email === '' || $this->message === '') {
            echo "Vyplň všetky polia!";
            return;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "Email nemá správny formát!";
            return;
        }

        // zápis do súboru
        $record = "--------------------------" . PHP_EOL;
        $record .= "Meno: {$this->name}" . PHP_EOL;
        $record .= "Email: {$this->email}" . PHP_EOL;
        $record .= "Správa: {$this->message}" . PHP_EOL;
        $record .= "Dátum: " . date("Y-m-d H:i:s") . PHP_EOL;

        file_put_contents($filePath, $record, FILE_APPEND);

        echo "Správa bola uložená!";
    }
}