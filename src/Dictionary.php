<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Dictionary
{

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
        $file = match($name) {
            'names' => Config::NAMES_FILE,
            'words' => Config::WORDS_FILE,
        };

        $this->$name = fgetcsv(fopen($file, 'r'));
    }
}
