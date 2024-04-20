<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;
use GereLajos\MeowMaker\Utils\Randomizer;

class Meow
{
    public Dictionary $dictionary;

    public function __construct(
    ) {
        $this->dictionary = new Dictionary();
    }

    public function name(NameType $type = NameType::FULL): Item
    {
        return Randomizer::pick($this->dictionary->names($type));
    }

    public function names(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->name(), $count);
    }

    public function maleNames(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->name(NameType::MALE), $count);
    }

    public function femaleNames(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->name(NameType::FEMALE), $count);
    }

    public function word(): Item
    {
        return Randomizer::pick($this->dictionary->words());
    }

    public function words(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->word(), $count);
    }

    public function sentence(int $minWords = Config::MIN_WORDS, int $maxWords = Config::MAX_WORDS): Item
    {
        $words = $this->words(mt_rand($minWords, $maxWords));
        $sentence = ucfirst(implode(' ', $words->toArray())).'.';

        return new Item($sentence);
    }

    public function sentences(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->sentence(), $count);
    }

    public function paragraph(int $minSentences = Config::MIN_SENTENCES, int $maxSentences = Config::MAX_SENTENCES): Item
    {
        $sentences = $this->sentences(mt_rand($minSentences, $maxSentences));

        return new Item(implode(' ', $sentences->toArray()));
    }

    public function paragraphs(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->paragraph(), $count);
    }
}
