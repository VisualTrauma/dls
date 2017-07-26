<?php

function toCommaSeparatedString($array) {
    $newString = '';

    if($array != '') {
        foreach($array as $item) {
            if($newString == '') {
                $newString = $item;
            } else {
                $newString = $newString . ', ' . $item;
            }
        }
    } else {
        $newString = '';
    }

    return $newString;
}

function stringToArray($string) {
    return explode(', ', $string);
}