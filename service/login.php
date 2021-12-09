
<?php include '../api_class/Service.php';?>
<?php

$service = new Service();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $getWebNotification = $service->userLogin($_POST);
    echo $getWebNotification;
}
