<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Dictionary
{
    private array $dictionary = [];

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
        if(!in_array($name, array_keys($this->dictionary))) {
            $this->loadFile($name);
        }

        return $this->dictionary[$name];
    }

    private function loadFile(string $name): void
    {
        $file = match($name) {
            'names' => Config::NAMES_FILE,
            'words' => Config::WORDS_FILE,
        };

        $this->dictionary[$name] = fgetcsv(fopen($file, 'r'));
    }
}
