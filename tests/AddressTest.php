<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Tests;

use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    private Meow $meow;

    public function setUp(): void
    {
        $this->meow = new Meow();
    }

    public function testItCanGenerateAddress(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->address());
    }

    public function testItCanGeneratePostcode(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->postcode());
    }

    public function testItCanGenerateStreet(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->street());
    }

    public function testItCanGenerateCity(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->city());
    }

    public function testItCanGenerateCountry(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->country());
    }

    public function testItCanGenerateBuildingNumber(): void
    {
        $this->assertInstanceOf(Item::class, $this->meow->buildingNumber());
    }
}
