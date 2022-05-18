<?php

function checkValidWord(String $guessword) {
    // Get the contents of the JSON file
    $accept = false;
    // Get the contents of the JSON file
    $strJsonFileContents = file_get_contents("library/wordlist.json");
    // Convert to array
    $array = json_decode($strJsonFileContents, true);
    $list = [];
    foreach ($array as $key => $word)
    {
        $list[] = strtolower($key);
    }
    foreach ($list as $word)
    {
        if ($word === $guessword) {
            $accept = true;
        }
    }
    return $accept;
}

