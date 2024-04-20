<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Structures;

use ArrayAccess;
use Countable;
use Stringable;

class Items implements ArrayAccess, Countable, Stringable
{
    public function __construct(
        public array $items = [],
    ) {
    }

    public function add(Item $item): void
    {
        $this->items[] = $item;
    }

    public function shuffle(): self
    {
        $items = $this->items;
        shuffle($items);

        return new self($items);
    }

    public function filter(callable $callback): self
    {
        $items = array_filter($this->items, $callback);

        return new self($items);
    }

    public function unique(): self
    {
        $items = array_unique($this->items);

        return new self($items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset): Item
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function __toString(): string
    {
        return implode(', ', $this->items);
    }
}
