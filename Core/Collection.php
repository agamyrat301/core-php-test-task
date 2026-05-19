<?php

class Collection implements Countable, IteratorAggregate
{
    public function __construct(private array $items) {}

    public function map(callable $fn): static
    {
        return new static(array_map($fn, $this->items));
    }

    public function filter(callable $fn): static
    {
        return new static(array_values(array_filter($this->items, $fn)));
    }

    public function first(): mixed
    {
        return $this->items[0] ?? null;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    // Makes Smarty {foreach} and PHP foreach work natively on the object
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
