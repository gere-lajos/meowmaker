<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Utils;

use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;

class Randomizer
{
    public static function pick(array $options): Item
    {
        return new Item($options[array_rand($options)]);
    }

    public static function pickToArray(callable $callback, int $count): Items
    {
        $items = new Items();
        for ($i = 0; $i < $count; $i++) {
            $items->add($callback());
        }

        return $items;
    }
}
