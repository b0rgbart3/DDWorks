<?php
/*
    JSON Data

    This is a generic Json data class that loads data in from 
    a JSON text file. Sub-class this data type for any purpose.

*/


class JsonData {
 
	public $filename;
    public $data_array;
    public $file;
    public $fullpath;
 
	function __construct( $path, $filename ) {
        $this->path = $path;
        $this->filename = $filename;
        $this->file = null;
        $this->data = null;
       // $this->dataArray = null;
        $this->loadMe();
        $this->parseMe();
	}
 
    /* Loop through the raw data array to build a structured data array */
    function parseMe() {
        $count = 0;
        $this->data = json_decode($this->file, true);

       // print_r($this->data);
       // $starts = [];
        // foreach($this->data as $index => $line) {
        //     // echo "|"; 
        //     // echo trim($line);
        //     // echo "|<br>";
        //     if (trim($line) === "{") {
        //         $count++;
        //         // starting a new object
        //         //array_push($starts, $index);
                
        //     }
        // }
     
    }

	function loadMe() {
      $this->fullpath = $this->path.'/'.$this->filename;
      $this->file = file_get_contents($this->fullpath);
     // $this->data = explode("\n", $this->file);
   
      //print_r($this->data);
      //$count = sizeof($this->data);
      //$last = $count -1;
      //$lastline = $this->data[$last];
      //if ($lastline == null) {
      //    array_pop($this->data);
     // }


    }
}
?>