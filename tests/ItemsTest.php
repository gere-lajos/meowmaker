<?php

declare(strict_types=1);

use GereLajos\MeowMaker\Meow;
use GereLajos\MeowMaker\Structures\Items;
use PHPUnit\Framework\TestCase;

class ItemsTest extends TestCase
{

    public function testItemsCanBeShuffled(): void
    {
        $items = new Items(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']);
        $shuffled = $items->shuffle();

        $this->assertNotEquals($items, $shuffled);
    }

    public function testItemsCanBeFiltered(): void
    {
        $items = new Items(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']);
        $filtered = $items->filter(fn ($item) => $item !== 'a');

        $this->assertNotContains('a', $filtered->toArray());
    }

    public function testItemsCanBeUnique(): void
    {
        $items = new Items(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'a']);
        $unique = $items->unique();

        $this->assertCount(10, $unique->toArray());
    }

    public function testItemsCanBeConvertedToJson(): void
    {
        $items = new Items(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']);
        $json = $items->toJson();
        $this->assertJson($json);
    }
}
