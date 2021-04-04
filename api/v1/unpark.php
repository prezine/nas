<?php
    include_once '../../app/app.php';
    include_once '../../app/controllers/Nas.php';
    include_once '../../app/controllers/FileReader.php';
    include_once '../../app/vendor/autoload.php';
    use Symfony\Component\Dotenv\Dotenv;
    $dotenv = new Dotenv();
    $nasacademy = new NasAcademy();
    $dotenv->load(__DIR__.'/.env');
    //$nasacademy->viewJson();

    $slotNumber = $nasacademy->cleanurl($_GET['slot_number']);
    echo $slotNumber;