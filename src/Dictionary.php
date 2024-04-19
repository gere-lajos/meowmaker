<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Dictionary
{
    private const string NAMES_FILE = __DIR__ . '/dictionary/names.csv';

    private $names = [];

    public function names(): array
    {
        if(!$this->names) {
            $this->loadNames();
        }

        return $this->names;
    }

    private function loadNames(): void
    {
        $this->names = fgetcsv(fopen(self::NAMES_FILE, 'r'));
    }
}
