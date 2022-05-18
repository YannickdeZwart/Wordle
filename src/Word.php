<?php

namespace Wordle;

class Word
{
    private String $word;
    private array $wordArray = [];

    public function __construct()
    {
        $this->makeWord();
    }

    public function getWordList()
    {
        // Get the contents of the JSON file
        $strJsonFileContents = file_get_contents("library/wordlist.json");
        // Convert to array
        $array = json_decode($strJsonFileContents, true);

        $list = [];

        foreach ($array as $key => $word)
        {
            $list[] = strtolower($key);
        }

        return $list;
    }

    public function makeWord()
    {
        $wordlist = $this->getWordList();
        $wordcount = count($wordlist) - 1;

        $randomn = random_int(0, $wordcount);

        $word = $wordlist[$randomn];

        while (strlen($word) != 5) {
            $randomn = random_int(0, $wordcount);

            $word = $wordlist[$randomn];
        }

        $wordlist = str_split($word);

        $this->setWord($word);
        $this->setWordArray($wordlist);
    }

    /**
     * @return String
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * @param String $word
     */
    public function setWord(string $word): void
    {
        $this->word = $word;
    }

    /**
     * @return array
     */
    public function getWordArray(): array
    {
        return $this->wordArray;
    }

    /**
     * @param array $wordArray
     */
    public function setWordArray(array $wordArray): void
    {
        $this->wordArray = $wordArray;
    }
}