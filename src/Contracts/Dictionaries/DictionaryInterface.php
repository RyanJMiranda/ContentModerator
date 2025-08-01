<?php

namespace RyanJMiranda\ContentModerator\Contracts\Dictionaries;

interface DictionaryInterface
{
    /**
     * Add a word to the dictionary.
     *
     * @param string $word
     * @return void
     */
    public function addWord(string $word): void;

    /**
     * Remove a word from the dictionary.
     *
     * @param string $word
     * @return void
     */
    public function removeWord(string $word): void;

    /**
     * Check if a word exists in the dictionary.
     *
     * @param string $word
     * @return bool
     */
    public function hasWord(string $word): bool;

    /**
     * Get all words in the dictionary.
     *
     * @return array<string>
     */
    public function getWords(): array;
}