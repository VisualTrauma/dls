<?php

function toCommaSeparatedString($array) {
    $newString = '';

    foreach($array as $item) {
        if($newString == '') {
            $newString = $item;
        } else {
            $newString = $newString . ', ' . $item;
        }
    }

    return $newString;
}

function stringToArray($string) {
    return explode(', ', $string);
}