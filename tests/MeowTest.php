<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Item;
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

    public function testItCanGenerateMoreNames(): void
    {
        $this->assertIsArray($this->meow->names(10));
        $this->assertCount(10, $this->meow->names(10));
    }

    public function testItCanGenerateWord(): void
    {
        $this->assertIsString($this->meow->word());
    }

    public function testItCanGenerateMoreWords(): void
    {
        $this->assertIsArray($this->meow->word(10));
        $this->assertCount(10, $this->meow->word(10));
    }

    public function testItCanGenerateSentence(): void
    {
        $this->assertIsString($this->meow->sentence());
    }

    public function testSentenceHasCorrectFormat(): void
    {
        $sentence = $this->meow->sentence();
        $this->assertStringStartsWith(ucfirst($sentence), $sentence);
        $this->assertStringEndsWith('.', $sentence);
    }

    public function testItCanGenerateMoreSentences(): void
    {
        $this->assertIsArray($this->meow->sentence(10));
        $this->assertCount(10, $this->meow->sentence(10));
    }

    public function testItCanGenerateParagraph(): void
    {
        $this->assertIsString($this->meow->paragraph());
    }

    public function testItCanGenerateMoreParagraphs(): void
    {
        $this->assertIsArray($this->meow->paragraph(10));
        $this->assertCount(10, $this->meow->paragraph(10));
    }
}
