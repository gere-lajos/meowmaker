<?php

declare(strict_types=1);

namespace GereLajos\MeowMaker\Tests;

use GereLajos\MeowMaker\Enums\MiscType;
use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Item;
use GereLajos\MeowMaker\Structures\Items;
use PHPUnit\Framework\TestCase;

class MiscTest extends TestCase
{
    private Meow $meow;

    public function setUp(): void
    {
        $this->meow = new Meow();
    }
    public function testItCanGenerateEmail(): void
    {
        $email = $this->meow->email();
        $this->assertInstanceOf(Item::class, $email);
        $this->assertStringContainsString('@', (string) $email);
        $this->assertMatchesRegularExpression('/^[a-z]+\.[a-z]+\.[0-9]+@[a-z]+\.[a-z]+$/', (string) $email);
    }

    public function testItCanGenerateMoreEmails(): void
    {
        $this->assertInstanceOf(Items::class, $this->meow->emails(10));
        $this->assertCount(10, $this->meow->emails(10));
    }

    public function testItCanGenerateCompany(): void
    {
        $company = $this->meow->company();
        $this->assertInstanceOf(Item::class, $company);
        $this->assertIsString((string) $company);
    }

    public function testItCangenerateJobTitle(): void
    {
        $jobTitle = $this->meow->jobTitle();
        $this->assertInstanceOf(Item::class, $jobTitle);
        $this->assertContains((string) $jobTitle, $this->meow->dictionary->misc(MiscType::JOBTITLE));
    }
}
