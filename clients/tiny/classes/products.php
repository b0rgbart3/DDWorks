<?php

/* This is the Products class definition
*/
class products {

    private $definition;

    public function __construct($argArray) {

//        print_r($argArray);

        date_default_timezone_set('America/Los_Angeles');
        $this->id = $argArray[0];
        $this->title = '';
        if (isset($argArray[1])) {
        $this->title = $argArray[1]; } 
        $this->created = null;
        if (isset($argArray[2])) {
        $this->created = $argArray[2]; }
        $this->width = null;
        if (isset($argArray[3])) {
        $this->width = $argArray[3]; }
        $this->height = 0;
        if (isset($argArray[4])) {
        $this->height = $argArray[4]; }
        $this->category = '';
        if (isset($argArray[5])) {
            $this->category = $argArray[5];
        }
        $this->sold = 0;
        if (isset($argArray[6])) {
            $this->sold = $argArray[6];
        }
        $this->archived = 0;
        if (isset($argArray[7])) {
            $this->archived = $argArray[7]; 
        }
        if (isset($argArray[8])) {
            $this->entered = $argArray[8]; 
        }

        
        date_default_timezone_set('America/Los_Angeles');
        $format = 'Y-m-d H:i:s';
        if ($this->created) {
        $this->created_dateObject = DateTime::createFromFormat($format, $this->created); } else {
           // echo "creating new date object<br><br>";
            $this->created_dateObject = time();
            
        }
        $this->image_id = null;

        $this->definition = "CREATE TABLE IF NOT EXISTS  `products` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(300) NULL, `created` DATETIME NULL, `width` VARCHAR(100) NULL, `height` VARCHAR(100) NULL,  `category` VARCHAR(200) NULL, `sold` BOOLEAN DEFAULT FALSE,  `archived` BOOLEAN DEFAULT FALSE, `entered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  PRIMARY KEY (id)); ";
        $this->images = [];
        $this->loadImages();

    }

    function myJSON() {
        $myString = $this->id;
        return "{ id: ". $myString.", t: '".$this->title."', cr: '".$this->created."', w: '".$this->width."', h: '".$this->height."', cat: '".$this->category."', s: ".$this->sold.", arc: ".$this->archived." }";

       }

    }