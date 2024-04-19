<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Dictionary
{
    private const string NAMES_FILE = __DIR__ . '/dictionary/names.csv';
    private const string WORDS_FILE = __DIR__ . '/dictionary/words.csv';

    private $names = [];
    private $words = [];

    public function names(): array
    {
        return $this->returnOrLoadFile('names');
    }

    public function words(): array
    {
        return $this->returnOrLoadFile('words');
    }

    private function returnOrLoadFile(string $name): array
    {
        if(!$this->$name) {
            $this->loadFile($name);
        }

        return $this->$name;
    }

    private function loadFile(string $name): void
    {
        $this->$name = fgetcsv(fopen(self::NAMES_FILE, 'r'));
    }
}
