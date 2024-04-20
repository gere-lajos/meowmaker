<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Tests;

use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Enums\NameType;
use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    private Meow $meow;

    public function setUp(): void
    {
        $this->meow = new Meow();
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

    public function testItCanGenerateMoreMaleNames(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->maleNames(10));
        $this->assertCount(10, $this->meow->maleNames(10));
    }

    public function testItCanGenerateMoreFemaleNames(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->femaleNames(10));
        $this->assertCount(10, $this->meow->femaleNames(10));
    }

    public function testItCanGenerateMoreNames(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->names(10));
        $this->assertCount(10, $this->meow->names(10));
    }

    public function testItCanGenerateLastName(): void
    {
        $name = $this->meow->lastName();
        $this->assertInstanceOf(Item::class, $name);
        $this->assertContains((string) $name, $this->meow->dictionary->misc(MiscType::LASTNAME));
    }

    public function testItCanGenerateFullName(): void
    {
        $name = $this->meow->fullName();
        $this->assertInstanceOf(Item::class, $name);
        
        list($firstName, $lastName) = explode(' ', (string) $name);
        $this->assertContains($firstName, $this->meow->dictionary->names());
        $this->assertContains($lastName, $this->meow->dictionary->misc(MiscType::LASTNAME));
    }

    public function testItCanGenerateAMaleFullName(): void
    {
        $name = $this->meow->maleFullName();
        $this->assertInstanceOf(Item::class, $name);
        
        list($firstName, $lastName) = explode(' ', (string) $name);
        $this->assertContains($firstName, $this->meow->dictionary->names(NameType::MALE));
        $this->assertContains($lastName, $this->meow->dictionary->misc(MiscType::LASTNAME));
    }

    public function testItCanGenerateAFemaleFullName(): void
    {
        $name = $this->meow->femaleFullName();
        $this->assertInstanceOf(Item::class, $name);
        list($firstName, $lastName) = explode(' ', (string)
        $name);
        $this->assertContains($firstName, $this->meow->dictionary
        ->names(NameType::FEMALE));
        $this->assertContains($lastName, $this->meow->dictionary
        ->misc(MiscType::LASTNAME));
    }

    public function testItCanGenerateMoreFullNames(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->fullNames(10));
        $this->assertCount(10, $this->meow->fullNames(10));
    }
}
