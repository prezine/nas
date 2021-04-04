<?php
    include_once '../../app/app.php';
    include_once '../../app/controllers/Nas.php';
    include_once '../../app/controllers/FileReader.php';
    include_once '../../app/vendor/autoload.php';
    use Symfony\Component\Dotenv\Dotenv;
    $dotenv = new Dotenv();
    $nasacademy = new NasAcademy();
    $filemanager = new FileReader();
    $dotenv->load(__DIR__.'/.env');
    $nasacademy->viewJson();
    
    if (REQUEST_METHOD == 'GET') {
        $carNumber = $_GET['car_number'];
        $slotNumber = $_GET['slot_number'];
        $data = $filemanager->reader(APP_HELPER . 'car.json');
        $parkSpace = sizeof($data);
        if ($slotNumber < $parkSpace) {
            $res = array(
                'status' => 200,
                'data' => $data[$slotNumber], 
            );
            echo json_encode($res, true);
        } else {
            echo $nasacademy->res('No Record found', 404);
        }
    } else {
        echo $nasacademy->res('Misdirected Request, Should be GET not '. REQUEST_METHOD, 421);
    }