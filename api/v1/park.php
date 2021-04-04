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

    if (REQUEST_METHOD == 'POST') {
        $data = $filemanager->reader(APP_HELPER . 'car.json');
        $lotSize = $nasacademy->env('PARKING_LOT_SIZE');
        $carNumber = '1234';
        $parkSpace = sizeof($data);
        if ($parkSpace < $lotSize) {
            // Save Data
            $query = array(
                $parkSpace => array(
                    "ip" => DEVICE_IP,
                    "car_number" => $carNumber
                ),
            );
            $res = $filemanager->writer($query, $data);
            // print Car Packed Successfully
            echo ($res == 'ok') ? $nasacademy->res('Car Parked Successfully', 200) : $nasacademy->res($res, 404);
        } else {
            // Throw error
            echo $nasacademy->res('Parking lot is full, Upgrade Required', 426);
        }
    } else {
        echo $nasacademy->res('Misdirected Request, Should be POST not '. REQUEST_METHOD, 421);
    }