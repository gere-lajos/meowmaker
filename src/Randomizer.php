<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Randomizer
{
    public static function pick(array $options): string
    {
        return $options[array_rand($options)];
    }

    public static function pickToArray(callable $callback, int $count): array
    {
        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = $callback();
        }

        return $items;
    }
}
