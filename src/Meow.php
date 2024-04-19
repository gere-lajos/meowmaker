<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Meow
{
    public function name(): string
    {
        $names = ['Abigél','Lujza'];

        return $names[array_rand($names)];
    }

    public function names(int $count = 1): array
    {
        $names = [];
        for ($i = 0; $i < $count; $i++) {
            $names[] = $this->name();
        }
        return $names;
    }
}
