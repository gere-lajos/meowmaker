<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

class Meow
{
    private Dictionary $dictionary;

    public function __construct(
    ) {
        $this->dictionary = new Dictionary();
    }

    public function name(): string
    {
        return $this->pickRandom($this->dictionary->names());
    }

    public function names(int $count = 1): array
    {
        $names = [];
        for ($i = 0; $i < $count; $i++) {
            $names[] = $this->name();
        }
        return $names;
    }

    public function word(): string
    {
        return $this->pickRandom($this->dictionary->words());
    }

    public function words(int $count = 1): array
    {
        $words = [];
        for ($i = 0; $i < $count; $i++) {
            $words[] = $this->word();
        }
        return $words;
    }

    private function pickRandom(array $options): string
    {
        return $options[array_rand($options)];
    }
}
