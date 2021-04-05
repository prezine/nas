<?php
    session_start();
    include_once '../../app/app.php';
    include_once '../../app/controllers/Nas.php';
    include_once '../../app/controllers/FileReader.php';
    include_once '../../app/vendor/autoload.php';
    use Symfony\Component\Dotenv\Dotenv;
    $dotenv = new Dotenv();
    $nasacademy = new NasAcademy();
    $filemanager = new FileReader();
    // Rate Limiter
    $nasacademy->rateLimiter();
    // Load dotenv
    $dotenv->load(__DIR__.'/.env');
    $nasacademy->viewJson();

    if (REQUEST_METHOD == 'DELETE') {
        $file = APP_PATH . '/helpers/car.json';
        // Get Slot number
        $slotNumber = $nasacademy->cleanurl($_GET['slot_number']);
        // Check car.json to find if it exist
        $data = $filemanager->reader(APP_HELPER . 'car.json');
        $parkSpace = sizeof($data);
        if ($slotNumber < $parkSpace) {
           if (isset($data[$slotNumber])) {
                // Deleting Data using Index
                unset($data[$slotNumber]);
            }
            $newArray = json_encode($data, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK);
            // Modify car.json with Updated Data
            // And Prompt Success message
            echo (file_put_contents($file, $newArray)) ? $nasacademy->res('Car #'. $slotNumber .' has been unset', 200) : $nasacademy->res('Server error', 404);
        } else {
            echo $nasacademy->res('No Record of Slot #'. $slotNumber .' found', 404);
        }
    } else {
        echo $nasacademy->res('Misdirected Request, Should be DELETE not '. REQUEST_METHOD, 421);
    }