<?php

class Helper
{
    public static function getPageTitle(): string
    {
        $script = $_SERVER['SCRIPT_NAME'];
        $page = ucfirst(basename($script, '.php'));
        return 'TechBlog - ' . $page;
    }
    
    public static function log(string $message): void
    {
        $dir = __DIR__ . '/../../storage';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $file = $dir . '/err.log';

        $date = date('Y-m-d H:i:s');

        $formattedMessage = "[$date] {$message}" . PHP_EOL;

        file_put_contents($file, $formattedMessage, FILE_APPEND);
    }
}