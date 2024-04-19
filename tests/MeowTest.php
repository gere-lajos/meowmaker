<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Meow;
use PHPUnit\Framework\TestCase;

class MeowTest extends TestCase
{
    public function testMeow(): void
    {
        $meow = new Meow();
        $this->assertInstanceOf(Meow::class, $meow);
    }
}
