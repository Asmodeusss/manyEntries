<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once($_SERVER['DOCUMENT_ROOT'] . "/config/database.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/models/foo_entry.php");

    $database = new Database();
    $db = $database->connect();

    $entry = new Foo_entry($db);

    $count = $entry->getEntryCount();

    ini_set('max_execution_time', 300);
    for ($x = 1; $x <= $count; $x++) {
        $entry->read($x);
        echo json_encode($entry) . "\n";
    }   
    

?>