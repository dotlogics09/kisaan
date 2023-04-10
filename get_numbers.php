<?php
include 'app/Controller.php';
$object = new Controller();

$response = "";
if (isset($_GET['kisaan_id'])) {
    $response = $object->getNumberDetails($_GET['kisaan_id']);
}

echo $response;

