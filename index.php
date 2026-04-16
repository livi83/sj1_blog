<?php
    //require 'app/functions.php';
    //redirect('public/templates/home.php');
    require 'app/core/Redirect.php';
    $redirect = new Redirect('public/templates/home.php');
    $redirect->redirect();
?>