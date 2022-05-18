<?php

$game = $_SESSION['game'];

$guessList = $game->getGuessList()->getGuessList();

$correct = 0;

foreach ($guessList as $guess) {
    if ($guess->getCorrect() === 1) {
        $correct++;
    }
}

if ($correct >= 1) {

    if (!isset($_SESSION['wins'])) {
        $_SESSION['wins'] = 1;
    } else {
        $_SESSION['wins']++;
    }

    unset($_SESSION['game'], $_POST);
    header("Refresh:0");
}