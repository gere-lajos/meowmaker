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

    public function sentence(int $minWords = Config::MIN_WORDS, int $maxWords = Config::MAX_WORDS): string
    {
        return ucfirst(implode(' ', $this->words(mt_rand($minWords, $maxWords)))) . '.';
    }

    public function sentences(int $count = 1): array
    {
        $sentences = [];
        for ($i = 0; $i < $count; $i++) {
            $sentences[] = $this->sentence();
        }
        return $sentences;
    }

    public function paragraph(int $minSentences = Config::MIN_SENTENCES, int $maxSentences = Config::MAX_SENTENCES): string
    {
        return implode(' ', $this->sentences(mt_rand($minSentences, $maxSentences)));
    }

    public function paragraphs(int $count = 1): array
    {
        $paragraphs = [];
        for ($i = 0; $i < $count; $i++) {
            $paragraphs[] = $this->paragraph();
        }
        return $paragraphs;
    }

    private function pickRandom(array $options): string
    {
        return $options[array_rand($options)];
    }
}
