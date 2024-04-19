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

    public function name(int $count = 1): string|array
    {
        if($count === 1) {
            return $this->pickRandom($this->dictionary->names());
        }

        return $this->pickRandomToArray(fn () => $this->name(), $count);
    }

    public function word(int $count = 1): string|array
    {
        if($count === 1) {
            return $this->pickRandom($this->dictionary->words());
        }

        return $this->pickRandomToArray(fn () => $this->word(), $count);
    }

    public function sentence(int $count = 1, int $minWords = Config::MIN_WORDS, int $maxWords = Config::MAX_WORDS): string|array
    {
        if($count === 1) {
            return ucfirst(implode(' ', $this->words(mt_rand($minWords, $maxWords)))) . '.';
        }

        return $this->pickRandomToArray(fn () => $this->sentence(), $count);
    }

    public function paragraph(int $count = 1, int $minSentences = Config::MIN_SENTENCES, int $maxSentences = Config::MAX_SENTENCES): string|array
    {
        if($count === 1) {
            return implode(' ', $this->sentence(mt_rand($minSentences, $maxSentences)));
        }

        return $this->pickRandomToArray(fn () => $this->paragraph(), $count);
    }

    private function pickRandom(array $options): string
    {
        return $options[array_rand($options)];
    }

    private function pickRandomToArray(callable $callback, int $count): array
    {
        $items = [];
        for ($i = 0; $i < $count; $i++) {
            $items[] = $callback();
        }
        return $items;
    }
}
