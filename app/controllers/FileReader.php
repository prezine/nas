<?php
/**
 * 
 */
class FileReader extends NasAcademy
{
  public function reader($file = '')
  {
    return $json = json_decode(file_get_contents($file), true);
  }
  public function writer($query = '', $file = '')
  {
    $arr_data = array(); // create empty array
    try {
      // Get data from existing json file
      $jsondata = file_get_contents($file);

      // Converts json data into array
      $cararray = json_decode($jsondata, true);

      // Push user data to array
      array_push($cararray, $query);

      // Convert updated array to JSON
      $jsondata = json_encode($cararray, JSON_PRETTY_PRINT);
      
      // Write json data into car.json file
      $res = (file_put_contents($file, $jsondata)) ? 'ok' : 'error' ;
      return $res;
    } catch (Exception $e) {
      return 'Caught exception: '.  $e->getMessage(). "\n";
    }
  }
}
