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
}
