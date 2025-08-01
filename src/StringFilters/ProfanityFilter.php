<?php

namespace RyanJMiranda\ContentModerator\StringFilters;

use RyanJMiranda\ContentModerator\Contracts\Dictionaries\DictionaryInterface;

class ProfanityFilter extends StringFilter
{
    protected DictionaryInterface $dictionary;

    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function apply($content): string
    {
        $badWords = $this->dictionary->getWords();
        $replacementCharacter = $this->getReplacementCharacter();

        foreach ($badWords as $word) {
            $pattern = '/\b' . preg_quote($word, '/') . '\b/iu';
            $content = preg_replace_callback($pattern, function ($matches) use ($replacementCharacter) {
                return str_repeat($replacementCharacter, mb_strlen($matches[0]));
            }, $content);
        }

        return $content;
    }
}