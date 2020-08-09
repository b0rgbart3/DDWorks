<?php

function get_path() {
    $path = getcwd();

    $pieces = explode("/", $path);
    $pieceCount = count($pieces);

    if ($pieces[$pieceCount-1] == "admin") {
        $path = "../";
    } else {
        $path ='';
    }
    return $path;
}

?>