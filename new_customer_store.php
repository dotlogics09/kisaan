<?php
include 'app/Controller.php';
$object = new Controller();

$response = "";
if (isset($_REQUEST)) {
    $response = $object->kisaan_details_store($_REQUEST);
}

echo $response;

