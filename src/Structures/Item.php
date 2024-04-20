<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Structures;

use Stringable;

class Item implements Stringable
{
    public function __construct(
        private string $value,
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
