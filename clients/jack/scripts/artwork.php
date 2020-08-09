<?php

/*
    Artwork

    This is a subclass of the DataClass.
    It uses the base data class to load in the text file,
    but then has unique data structures for identifying the
    data as artwork information.

    id | title | price | sold | date | width | height | media | description | images

*/


class Artwork extends JsonData{
    public $collection;
    public $pieces;
 
	function __construct( $path, $filename ) {
        parent::__construct( $path, $filename);
        $this->collection = [];
        //$this->split();
        $this->assign();
    }
    function count() {
        return sizeof($this->collection);
    }

    function outputImages() {
        foreach ($this->collection as $artIndex => $piece) {
            $piece->output();
        }
    }

    function outputThumbnails() {
        foreach ($this->collection as $artIndex => $piece) {
            $piece->outputThumbnail();
        }
    }
    function assign() {
        foreach($this->data as $index => $artwork)
        {
            $piece = new Piece($artwork['id'],
            $artwork['title'],
            $artwork['price'],
            $artwork['sold'], 
            $artwork['date'],
            $artwork['width'],
            $artwork['height'],
            $artwork['media'],
            $artwork['description'],
            $artwork['images']);
            
            array_push($this->collection, $piece);
        }
    }
    function split() {
        
        foreach($this->data as $index => $row)
        {
            //get row data
            
            $row_data = explode('|', $row);
            $id = trim($row_data[0]);
            $title = trim($row_data[1]);
            $price = trim($row_data[2]);
            $sold = trim($row_data[3]);
            $date = trim($row_data[4]);
            $width = trim($row_data[5]);
            $height = trim($row_data[6]);
            $media = trim($row_data[7]);
            $description = trim($row_data[8]);
            $images = explode(' & ', $row_data[9]);

            $piece = new Piece($id,$title,$price, $sold, $date,$width,$height,$media,$description,$images);
            
            array_push($this->collection, $piece);
           // $piece->toOutput();

        }

    }
}

?>