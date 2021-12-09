
<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once '../api_class/Service.php';
$service = new Service();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // echo "<pre>";
    // print_r($_FILES);
    // var_dump($_POST);
    // die;

    $updateManageAds = $service->updateMaageAds($_POST, $_FILES);
    echo $updateManageAds;
}
