<?php

namespace Wordle;

class GuessList
{
    private array $guessList = [];

    public function addGuess(Guess $guess)
    {
        $this->guessList[] = $guess;
    }

    /**
     * @return array
     */
    public function getGuessList(): array
    {
        return $this->guessList;
    }

}