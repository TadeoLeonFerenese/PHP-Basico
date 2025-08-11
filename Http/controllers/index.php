<?php 

$_SESSION['name']  = 'Tadeo';

view("index.view.php", [
    'heading' => 'Home',
]);