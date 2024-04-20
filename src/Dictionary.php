<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

use GereLajos\MeowMaker\Enums\NameType;

class Dictionary
{
    private array $dictionary = [];

    public function names(NameType $type = NameType::FULL): array
    {
        return $this->returnOrLoadFile('names')[$type->value];
    }

    public function words(string $type = 'full'): array
    {
        return $this->returnOrLoadFile('words')[$type];
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

        $fileContent = file_get_contents($file);
        $types = explode("\n", $fileContent);
        
        foreach($types as $type) {
            if(strpos($type, ':') === false) {
                $this->dictionary[$name]['full'] = [
                    ...$this->dictionary[$name]['full'] ?? [],
                    ...explode(',', $type)
                ];

                continue;
            }

            list($typeName, $values) = explode(':', $type);
            $this->dictionary[$name][$typeName] = explode(',', $values);

            $this->dictionary[$name]['full'] = [
                ...$this->dictionary[$name]['full'] ?? [],
                ...$this->dictionary[$name][$typeName]
            ];
        }
    }
}
