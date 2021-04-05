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
    $current_data = file_get_contents($file);  
    $array_data = json_decode($current_data, true);  
    $extra = $query; 
    $array_data[] = $extra;  
    $final_data = json_encode($array_data, JSON_PRETTY_PRINT); 
    return (file_put_contents($file, $final_data)) ? 'ok' : 'error' ;
  }
  public function deletor($id = '', $file = '', $data = '')
  {
    
  }
}
