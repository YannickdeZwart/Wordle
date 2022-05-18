<?php

namespace Wordle;

class Guess
{
    private Word $word;
    private array $guess;
    private int $correct = 0;
    private int $wrong = 0;
    private array $correctList = [];

    /**
     * @param Word $word
     */
    public function __construct(Word $word, array $guess)
    {
        $this->word = $word;
        $this->guess = $guess;
        $this->makeCorrectList();
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
     * @return array
     */
    public function getGuess(): array
    {
        return $this->guess;
    }

    /**
     * @param array $guess
     */
    public function setGuess(array $guess): void
    {
        $this->guess = $guess;
    }

    /**
     * @return int
     */
    public function getCorrect(): int
    {
        return $this->correct;
    }

    /**
     * @param int $correct
     */
    public function setCorrect(int $correct): void
    {
        $this->correct = $correct;
    }

    /**
     * @return int
     */
    public function getWrong(): int
    {
        return $this->wrong;
    }

    /**
     * @param int $wrong
     */
    public function setWrong(int $wrong): void
    {
        $this->wrong = $wrong;
    }

    /**
     * @return array
     */
    public function getCorrectList(): array
    {
        return $this->correctList;
    }

    /**
     * @param array $correctList
     */
    public function setCorrectList(array $correctList): void
    {
        $this->correctList = $correctList;
    }
    public function checkGuess()
    {
        $word = implode("", $this->guess);

        if ($this->word->getWord() === strtolower($word)) {
            $this->correct++;
        } else {
            $this->wrong++;
        }
    }
    public function makeCorrectList()
    {
        $word =  str_split($this->word->getWord());
        $guess = $this->guess;

        for ($i=0;$i < 5;$i++)
        {
            $inArray = false;
            for ($a=0;$a < 5 ;$a++)
            {
                if ($guess[$i] === $word[$a]) {
                   $inArray = true;
                }
            }

            if (strtolower($guess[$i]) === strtolower($word[$i])) {
                $this->correctList[] = 'correct';
            } elseif($inArray === true) {
                $this->correctList[] = 'in-correct';
            } else {
                $this->correctList[] = 0;
            }
        }
    }
}