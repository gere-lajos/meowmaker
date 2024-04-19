<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Meow;
use PHPUnit\Framework\TestCase;

class MeowTest extends TestCase
{
    public function testItCanBeInstantiated(): void
    {
        $meow = new Meow();
        $this->assertInstanceOf(Meow::class, $meow);
    }

    public function testItCanGenerateAName(): void
    {
        $meow = new Meow();
        $this->assertIsString($meow->name());
    }

    public function testItCanGenerateMoreNames(): void
    {
        $meow = new Meow();
        $this->assertIsArray($meow->names(10));
        $this->assertCount(10, $meow->names(10));
    }
}
