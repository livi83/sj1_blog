<?php
    // Techblog - nazovstranky
    function getTitle():string{
        $page = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php'));
        return 'Techblog - '.$page;
    }

    function redirect(string $url):void{
        header('Location: '.$url);
        exit(); 
    }
    
    function saveMessage(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if (empty($name) || empty($email) || empty($message)) {
                echo "Vyplň všetky polia!";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email nemá správny formát!";
                return;
            }
            
            $zaznam = "--------------------------" . PHP_EOL;
            $zaznam .= "Meno: $name" . PHP_EOL;
            $zaznam .= "Email: $email" . PHP_EOL;
            $zaznam .= "Správa: $message" . PHP_EOL;
            $zaznam .= "Dátum: " . date("Y-m-d H:i:s") . PHP_EOL;

            file_put_contents("../../storage/messages.txt", $zaznam, FILE_APPEND);

            echo "Správa bola uložená!";
        }  
    }
?>