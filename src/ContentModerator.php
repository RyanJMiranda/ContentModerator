<?php

namespace RyanJMiranda\ContentModerator;

use RyanJMiranda\ContentModerator\Contracts\Filters\FilterInterface;

class ContentModerator
{
    /**
     * @var array<FilterInterface> List of registered filters.
     */
    protected array $filters = [];

    /**
     * Register a filter.
     *
     * @param FilterInterface $filter
     * @return void
     */
    public function registerFilter(FilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    /**
     * Remove a filter by its class name.
     *
     * @param string $filterClass
     * @return void
     */
    public function removeFilter(string $filterClass): void
    {
        $this->filters = array_filter(
            $this->filters,
            fn(FilterInterface $filter) => get_class($filter) !== $filterClass
        );
    }

    /**
     * Get all registered filters.
     *
     * @return array<FilterInterface>
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * Apply all registered filters to the content.
     *
     * @param mixed $content
     * @return mixed
     */
    public function moderate(mixed $content): mixed
    {
        foreach ($this->filters as $filter) {
            $content = $filter->apply($content);
        }

        return $content;
    }
}