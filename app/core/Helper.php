<?php

class Helper
{
    /**
     * keby neni staticka:
     * $helper = new Helper();
     * $helper->getPageTitle();
     * 
     * volanie statickej:
     * Helper::getPageTitle
     */
    public static function getPageTitle(): string
    {
        $script = $_SERVER['SCRIPT_NAME'];
        $page = ucfirst(basename($script, '.php'));
        return 'TechBlog - ' . $page;
    }

}