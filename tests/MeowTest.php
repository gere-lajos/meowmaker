<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Dictionary;
use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;
use PHPUnit\Framework\TestCase;

class MeowTest extends TestCase
{
    private Meow $meow;

    public function setUp(): void
    {
        $this->meow = new Meow();
    }

    public function testItCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Meow::class, $this->meow);
    }

    public function testItCanGenerateAName(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->name());
    }

    public function testItCanGenerateAMaleName(): void
    {
        $name = $this->meow->maleName();
        $this->assertInstanceOf(Item::class, $name);
        $this->assertContains((string) $name, $this->meow->dictionary->names(NameType::MALE));
    }

    public function testItCanGenerateAFemaleName(): void
    {
        $name = $this->meow->femaleName();
        $this->assertInstanceOf(Item::class, $name);
        $this->assertContains((string) $name, $this->meow->dictionary->names(NameType::FEMALE));
    }

    public function testItCanGenerateMoreNames(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->names(10));
        $this->assertCount(10, $this->meow->names(10));
    }

    public function testItCanGenerateWord(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->word());
    }

    public function testItCanGenerateMoreWords(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->words(10));
        $this->assertCount(10, $this->meow->words(10));
    }

    public function testItCanGenerateSentence(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->sentence());
    }

    public function testSentenceHasCorrectFormat(): void
    {
        $sentence = (string) $this->meow->sentence();
        $this->assertStringStartsWith(ucfirst($sentence), $sentence);
        $this->assertStringEndsWith('.', $sentence);
    }

    public function testItCanGenerateMoreSentences(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->sentences(10));
        $this->assertCount(10, $this->meow->sentences(10));
    }

    public function testItCanGenerateParagraph(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->paragraph());
    }

    public function testItCanGenerateMoreParagraphs(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->paragraphs(10));
        $this->assertCount(10, $this->meow->paragraphs(10));
    }
}
