<?php

namespace RyanJMiranda\ContentModerator\Contracts\Filters;

/**
 * @template T
 */
interface FilterInterface
{
    /**
     * @param mixed $content
     * @return mixed
     */
    public function apply($content);
}