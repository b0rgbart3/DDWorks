<?php

class Piece {
    public $id;
    public $title, $price, $sold;
    public $date, $width, $height, $media;
    public $images;
 
	function __construct( $id, $title, $price, $sold, $datestring, $width, $height, $media, $description, $images ) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->sold = $sold;
        $this->width = $width;
        $this->height = $height;
        $this->date = new DateTime($datestring);
//        echo "constructing piece with date: ".$creation_date;
        $this->media = $media;
        $this->description = $description;
        $this->images = $images;
	}
    function outputThumbnail() {
        echo "<div class='thumbnail' data-piece='".$this->id."'>";
        $image = $this->images[0];
        $imagename = trim($image);
        echo "<img src='uploads/artwork/".$imagename."' class='portimage'>";
        echo "</div>";
    }
    function output() {
        echo "<br>";
        echo "<div class='artwork'>";
    
        foreach($this->images as $imageIndex => $image) {
            $imagename = trim($image);
            echo "<img src='uploads/artwork/".$imagename."' class='portimage'>";
            echo "<br>";
        }
        echo "<div class='titleBox'>";
        echo "<div class='title'>";
        echo $this->title;
        echo "</div>";
        echo "<div class='date'>";
       
        echo date_format($this->date, 'Y');  /* 'F j, Y'); */
        echo "<br>";
        if ($this->sold!=="sold") {
             echo $this->sold.", ".$this->price; } else {
                 echo "<div class='soldDot'>&nbsp;&nbsp;  &nbsp;</div>".$this->sold;
             }
        echo "<br>";
        echo "</div>";
        echo "<div class='date'>";
        echo $this->width." X ".$this->height;
        echo "</div>";
        echo "<div class='media'>";
        echo $this->media;
        echo "</div>";
        echo "<div class='description'>";
        echo $this->description;
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

}

?>
