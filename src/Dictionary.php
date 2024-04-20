<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

use GereLajos\MeowMaker\Enums\DictionaryType;
use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Enums\WordType;

class Dictionary
{
    private array $dictionary = [];

    public function misc(MiscType $type): array
    {
        return $this->returnOrLoadFile(DictionaryType::MISC)[$type->value];
    }

    public function names(NameType $type = NameType::FULL): array
    {
        return $this->returnOrLoadFile(DictionaryType::NAMES)[$type->value];
    }

    public function words(WordType $type = WordType::FULL): array
    {
        return $this->returnOrLoadFile(DictionaryType::WORDS)[$type->value];
    }

    private function returnOrLoadFile(DictionaryType $type): array
    {
        if(!in_array($type->value, array_keys($this->dictionary))) {
            $this->loadFile($type);
        }

        return $this->dictionary[$type->value];
    }

    private function loadFile(DictionaryType $type): void
    {
        $file = match($type) {
            DictionaryType::MISC => Config::MISC_FILE,
            DictionaryType::NAMES => Config::NAMES_FILE,
            DictionaryType::WORDS => Config::WORDS_FILE,
        };

        $fileContent = file_get_contents($file);
        $types = explode("\n", $fileContent);
        $name = $type->value;

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
