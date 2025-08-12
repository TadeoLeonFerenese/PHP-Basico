<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = :user_id', [
    'user_id' => $_SESSION['user']['id']
])->get();
view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);