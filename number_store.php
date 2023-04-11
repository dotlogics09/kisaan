<?php
include 'app/Controller.php';
$object = new Controller();

$response = "";
if (isset($_REQUEST)) {
    $response = $object->add_new_number($_REQUEST);
}

echo $response;

