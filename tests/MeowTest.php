<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Meow;
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
        $this->assertIsString($this->meow->name());
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
        $this->assertIsArray($this->meow->words(10));
        $this->assertCount(10, $this->meow->words(10));
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
        $this->assertIsArray($this->meow->sentences(10));
        $this->assertCount(10, $this->meow->sentences(10));
    }

    public function testItCanGenerateParagraph(): void
    {
        $this->assertIsString($this->meow->paragraph());
    }

    public function testItCanGenerateMoreParagraphs(): void
    {
        $this->assertIsArray($this->meow->paragraphs(10));
        $this->assertCount(10, $this->meow->paragraphs(10));
    }
}
