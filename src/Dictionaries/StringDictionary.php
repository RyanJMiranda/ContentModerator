<?php

namespace RyanJMiranda\ContentModerator\Dictionaries;

use RyanJMiranda\ContentModerator\Contracts\Dictionaries\DictionaryInterface;

class StringDictionary implements DictionaryInterface
{
    /**
     * @var array<string, true> A map of words to a boolean value for fast lookups.
     */
    protected array $words = [];

    /**
     * Add a word to the dictionary.
     *
     * @param string $word The word to add.
     * @return void
     */
    public function addWord(string $word): void
    {
        $this->words[$word] = true;
    }

    /**
     * Remove a word from the dictionary.
     *
     * @param string $word The word to remove.
     * @return void
     */
    public function removeWord(string $word): void
    {
        unset($this->words[$word]);
    }

    /**
     * Check if a word exists in the dictionary.
     *
     * @param string $word The word to check.
     * @return bool True if the word exists, false otherwise.
     */
    public function hasWord(string $word): bool
    {
        return isset($this->words[$word]);
    }

    /**
     * Get all words in the dictionary.
     *
     * @return array<string> A list of all words in the dictionary.
     */
    public function getWords(): array
    {
        return $this->words;
    }
}