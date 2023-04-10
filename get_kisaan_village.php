<?php
include 'app/Controller.php';
$object = new Controller();

$response = "";
if (isset($_GET['village'])) {
    $response = $object->getkisaanByvillage($_GET['village']);
}

echo $response;

