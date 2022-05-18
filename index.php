<?php

require_once "vendor/autoload.php";

use Wordle\Game;

session_start();



if (!isset($_SESSION["game"])) {
    $game = new Game();
    $_SESSION['game'] = $game;
} else {
    $game = $_SESSION['game'];
}

require_once "./components/guesshandler.php";
if (count($game->getGuessList()->getGuessList()) >= 1) {
    $lastGuess = $game->getGuessList()->getGuessList()[count($game->getGuessList()->getGuessList()) - 1];

    if ($lastGuess->getCorrect() === 1) {
        require_once "./components/winhandler.php";
    } else {
        require_once "./components/losehandler.php";
    }
}

?>

<!doctype html>
<html lang="en" id="body">
<head>
    <link rel="stylesheet" href="/css/Main.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wordle | <?php echo $game->getWord()->getWord(); ?></title>
</head>
<body>
    <div class="letter-container">
        <div class="box-container">
            <?php
            if ($game->getGuessList()->getGuessList() > 0) {
            foreach ($game->getGuessList()->getGuessList() as $guess)
            {
                ?>
                <form action="#" method="POST">
                    <div class="row-container">
                        <?php

                        for($i=0;$i < 5;$i++)
                        {
                            ?>
                            <input type="text" maxlength="1" class="letters <?php echo $guess->getCorrectList()[$i] ?>" value="<?php echo $guess->getGuess()[$i] ?>" disabled>
                            <?php
                        }
                        ?>
                    </div>
                </form>
                <?php
            }
            }
                ?>
                    <form action="#" method="POST" id="main-form">
                        <div class="row-container">
                        <input type="text" name="letter1" id="letter1" maxlength="1" class="letters" autofocus>
                        <input type="text" name="letter2" id="letter2" maxlength="1" class="letters">
                        <input type="text" name="letter3" id="letter3" maxlength="1" class="letters">
                        <input type="text" name="letter4" id="letter4" maxlength="1" class="letters">
                        <input type="text" name="letter5" id="letter5" maxlength="1" class="letters">
                        </div>
                    </form>
        </div>
    </div>
<div class="score-container">
    <div class="score-box-container">
        <h2>Lose: <?php
            if (!isset($_SESSION['lose'])) {
                echo "0";
            } else {
                echo $_SESSION['lose'];
            }
             ?></h2>
        <h2>Wins: <?php
            if (!isset($_SESSION['wins'])) {
                echo "0";
            } else {
                echo $_SESSION['wins'];
            }
             ?></h2>
    </div>
</div>
</body>
<script src="js/Move.js"></script>
</html>