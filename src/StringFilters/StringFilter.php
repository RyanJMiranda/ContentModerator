<?php

namespace RyanJMiranda\ContentModerator\StringFilters;

use RyanJMiranda\ContentModerator\Contracts\Filters\StringFilterInterface;

abstract class StringFilter implements StringFilterInterface
{
    public string $replacementCharacter = '*';

    public function getReplacementCharacter(): string
    {
        return $this->replacementCharacter;
    }

    public function setReplacementCharacter(string $replacement): void
    {
        $this->replacementCharacter = $replacement;
    }

    abstract public function apply($content);
}