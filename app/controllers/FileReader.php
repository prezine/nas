<?php
/**
 * 
 */
class FileReader extends NasAcademy
{
  protected $maxSize;
  protected $extension;
  protected $destination;
  protected $file_size;
  protected $file_name;
  protected $file_tmp;
  
  public function setMaxSize($sizeMB){
    return $this->maxSize = $sizeMB * (1024 * 1024);
  }

  //check extension
  public function setExtension($option){
    return $this->extension = $option;
  }

  //path
  public function setDir($path){
    return $this->destination = $path;
  }

  public function action($file) {
    $this->file_size = $_FILES[$file]['size'];
    $this->file_name = $_FILES[$file]['name'];
    $this->file_tmp = $_FILES[$file]['tmp_name'];
    if($this->file_size > $this->maxSize) {
      return 201;
    } else if(!in_array(pathinfo($this->file_name, PATHINFO_EXTENSION), $this->extension)) {
      return 202;
    } else {
      move_uploaded_file($this->file_tmp, $this->destination . RAND_TIMESTAMP . $this->file_name);
      return RAND_TIMESTAMP . $this->file_name;
    }
  }
}
