<?php

$game = $_SESSION['game'];

$guessList = $game->getGuessList()->getGuessList();

$wrong = 0;

foreach ($guessList as $guess) {
    if ($guess->getWrong() === 1) {
        $wrong++;
    }
}

if ($wrong >= 5) {

    if (!isset($_SESSION['lose'])) {
        $_SESSION['lose'] = 1;
    } else {
        $_SESSION['lose']++;
    }

    unset($_SESSION['game'], $_POST);
    header("Refresh:0");
}