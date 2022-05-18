<?php

namespace Wordle;

class Game
{
    private Word $word;
    private GuessList $guessList;

    /**
     * @param Game $game
     */
    public function __construct()
    {
        $this->word = new Word();
        $this->guessList = new GuessList();
    }

    /**
     * @return Word
     */
    public function getWord(): Word
    {
        return $this->word;
    }

    /**
     * @param Word $word
     */
    public function setWord(Word $word): void
    {
        $this->word = $word;
    }

    /**
     * @return GuessList
     */
    public function getGuessList(): GuessList
    {
        return $this->guessList;
    }

    /**
     * @param GuessList $guessList
     */
    public function setGuessList(GuessList $guessList): void
    {
        $this->guessList = $guessList;
    }
}