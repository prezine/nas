<?php
    include_once '../../app/app.php';
    include_once '../../app/controllers/Nas.php';
    include_once '../../app/controllers/FileReader.php';
    include_once '../../app/vendor/autoload.php';
    use Symfony\Component\Dotenv\Dotenv;
    $dotenv = new Dotenv();
    $nasacademy = new NasAcademy();
    $dotenv->load(__DIR__.'/.env');
    $nasacademy->viewJson();

    if (REQUEST_METHOD == 'DELETE') {
        $slotNumber = $nasacademy->cleanurl($_GET['slot_number']);
        $res = array(
            'status' => 200, 
            'ip' => DEVICE_IP,
            'data' => array(
                'car_number' => "ABC123", 
            ), 
        );
        echo json_encode($res, true);
    } else {
        echo $nasacademy->res('Misdirected Request, Should be DELETE not '. REQUEST_METHOD, 421);
    }