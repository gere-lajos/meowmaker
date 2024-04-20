<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Dictionary;
use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Enums\WordType;
use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
    public function testMisc(): void
    {
        $dictionary = new Dictionary();

        $this->assertIsArray($dictionary->misc(MiscType::DOMAIN));
        $this->assertNotEmpty($dictionary->misc(MiscType::DOMAIN));
    }

    public function testNames(): void
    {
        $dictionary = new Dictionary();
        $names = $dictionary->names();

        $this->assertIsArray($names);
        $this->assertNotEmpty($names);
        $this->assertNotEmpty($dictionary->names(NameType::MALE));
        $this->assertNotEmpty($dictionary->names(NameType::FEMALE));
    }

    public function testWords(): void
    {
        $dictionary = new Dictionary();
        $words = $dictionary->words();

        $this->assertIsArray($words);
        $this->assertNotEmpty($words);
        $this->assertNotEmpty($dictionary->words(WordType::FULL));
        $this->assertNotEmpty($dictionary->words(WordType::ADJECTIVE));
    }
}
