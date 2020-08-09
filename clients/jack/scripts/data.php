<?php
/*
    Data

    This is a generic data class that loads data in from 
    a text file. Sub-class this data type for any purpose.

*/


class Data {
 
	public $filename;
    public $data_array;
    public $file;
    public $fullpath;
 
	function __construct( $path, $filename ) {
        $this->path = $path;
        $this->filename = $filename;
        $this->file = null;
        $this->data = null;
        $this->loadMe();
	}
 
	function loadMe() {
      $this->fullpath = $this->path.'/'.$this->filename;
      $this->file = file_get_contents($this->fullpath);
      $this->data = explode("\n", $this->file);
   
      //print_r($this->data);
      $count = sizeof($this->data);
      $last = $count -1;
      $lastline = $this->data[$last];
      if ($lastline == null) {
          array_pop($this->data);
      }


    }
}
?>