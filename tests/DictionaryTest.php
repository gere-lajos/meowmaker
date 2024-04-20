<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Dictionary;
use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
    public function testNames(): void
    {
        $dictionary = new Dictionary();
        $names = $dictionary->names();

        $this->assertIsArray($names);
        $this->assertNotEmpty($names);
    }

    public function testWords(): void
    {
        $dictionary = new Dictionary();
        $words = $dictionary->words();

        $this->assertIsArray($words);
        $this->assertNotEmpty($words);
    }
}
