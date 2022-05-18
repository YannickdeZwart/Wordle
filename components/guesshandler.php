<?php

if (isset($_POST['letter1'], $_POST['letter2'])) {

    $game = $_SESSION['game'];
    $word = $game->getWord();
    $guessList = $game->getGuessList();

    $_SESSION['firstGuess'] = true;

    $wordlist = [$_POST['letter1'], $_POST['letter2'], $_POST['letter3'], $_POST['letter4'], $_POST['letter5']];

    $guess = new \Wordle\Guess($word, $wordlist);
    
    require_once "./components/checkword.php";

    $wordGuess = implode("", $wordlist);

    $wordGuess = strtolower($wordGuess);

    if (checkValidWord($wordGuess)) {
        if (count($guessList->getGuessList()) >= 1) {
            $lastguess = $guessList->getGuessList()[count($guessList->getGuessList()) - 1];

            $prevword = $lastguess->getGuess();


            if ($prevword === $wordlist) {
                echo "cant use previous word";
            } else {
                echo $guess->checkGuess();

                $guessList->addGuess($guess);
            }
        } else {
            echo $guess->checkGuess();

            $guessList->addGuess($guess);
        }
    } else {
        echo "not a valid word";
    }
}

