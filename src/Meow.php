<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

use GereLajos\MeowMaker\Utils\Randomizer;

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
            return Randomizer::pick($this->dictionary->names());
        }

        return Randomizer::pickToArray(fn () => $this->name(), $count);
    }

    public function word(int $count = 1): string|array
    {
        if($count === 1) {
            return Randomizer::pick($this->dictionary->words());
        }

        return Randomizer::pickToArray(fn () => $this->word(), $count);
    }

    public function sentence(int $count = 1, int $minWords = Config::MIN_WORDS, int $maxWords = Config::MAX_WORDS): string|array
    {
        if($count === 1) {
            return ucfirst(implode(' ', $this->word(mt_rand($minWords, $maxWords)))) . '.';
        }

        return Randomizer::pickToArray(fn () => $this->sentence(), $count);
    }

    public function paragraph(int $count = 1, int $minSentences = Config::MIN_SENTENCES, int $maxSentences = Config::MAX_SENTENCES): string|array
    {
        if($count === 1) {
            return implode(' ', $this->sentence(mt_rand($minSentences, $maxSentences)));
        }

        return Randomizer::pickToArray(fn () => $this->paragraph(), $count);
    }
}
