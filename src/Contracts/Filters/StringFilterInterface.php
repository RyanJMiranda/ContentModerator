<?php

namespace RyanJMiranda\ContentModerator\Contracts\Filters;

/**
 * @extends FilterInterface<string>
 */
interface StringFilterInterface extends FilterInterface
{
    /**
     * @param string $content
     * @return string
     */
    public function apply($content);
}