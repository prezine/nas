<?php
    include_once 'app/app.php';
    include_once 'app/controllers/Nas.php';
    $nasacademy = new NasAcademy();
    $nasacademy->viewJson();
    $schema = array(
        'endpoint-url' => APP_URL . 'api/v1/', 
        'park-url' => APP_URL . 'api/v1/park', 
        'unpark-url' => APP_URL . 'api/v1/unpark/{:slot_number}', 
        'get-info-url' => APP_URL . 'api/v1/get-info?car_number={:car_number},slot_number={:slot_number}', 
    );
    echo json_encode($schema, true);