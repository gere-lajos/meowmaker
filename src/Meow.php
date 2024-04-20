<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker;

use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Enums\WordType;
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

    public function maleName(): Item
    {
        return $this->name(NameType::MALE);
    }

    public function femaleName(): Item
    {
        return $this->name(NameType::FEMALE);
    }

    public function names(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->name(), $count);
    }

    public function maleNames(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->maleName(), $count);
    }

    public function femaleNames(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->femaleName(), $count);
    }

    public function lastName(): Item
    {
        return Randomizer::pick($this->dictionary->misc(MiscType::LASTNAME));
    }

    public function fullName(NameType $type = NameType::FULL): Item
    {
        $firstName = $this->name($type);
        $lastName = $this->lastName();

        return new Item("$firstName $lastName");
    }

    public function maleFullName(): Item
    {
        return $this->fullName(NameType::MALE);
    }

    public function femaleFullName(): Item
    {
        return $this->fullName(NameType::FEMALE);
    }

    public function fullNames(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->fullName(), $count);
    }

    public function phone(): Item
    {
        $phone = '+'.mt_rand(1, 9).mt_rand(100, 999).mt_rand(100, 999).mt_rand(1000, 9999);

        return new Item($phone);
    }

    public function company(): Item
    {
        $company = Randomizer::pick($this->dictionary->misc(MiscType::COMPANY));
        $company_suffix = Randomizer::pick($this->dictionary->misc(MiscType::COMPANY_SUFFIX));

        return new Item("$company $company_suffix");
    }

    public function jobTitle(): Item
    {
        return Randomizer::pick($this->dictionary->misc(MiscType::JOBTITLE));
    }

    public function email(): Item
    {
        $adjective = Randomizer::pick($this->dictionary->words(WordType::ADJECTIVE));
        $name = $this->name();
        $number = mt_rand(1, 999);
        $domain = Randomizer::pick($this->dictionary->misc(MiscType::DOMAIN));
        $email = strtolower("$adjective.$name.$number@$domain");

        return new Item($email);
    }

    public function emails(int $count = 1): Items
    {
        return Randomizer::pickToArray(fn () => $this->email(), $count);
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
