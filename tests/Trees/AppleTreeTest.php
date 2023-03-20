<?php

declare(strict_types=1);

namespace Trees;

include_once(__DIR__ . '/../../Trees/AppleTree.php');

use Fruits\Apple;
use PHPUnit\Framework\TestCase;

class AppleTreeTest extends TestCase
{
    public function testGetName(): void
    {
        $tree = new AppleTree(1);

        $name = $tree->getName();

        $this->assertEquals('Apple Tree', $name);
    }

    public function testGetId(): void
    {
        $tree = new AppleTree(1);

        $id = $tree->getId();

        $this->assertEquals(1, $id);
    }

    public function testGetYield(): void
    {
        $tree = new AppleTree(1);

        $yield = $tree->getYield();

        $this->assertIsInt($yield);
        $this->assertGreaterThanOrEqual(40, $yield);
        $this->assertLessThanOrEqual(50, $yield);
    }

    public function testFruit(): void
    {
        $tree = new AppleTree(1);

        foreach ($tree->collectFruits() as $fruit) {
            $this->assertInstanceOf(Apple::class, $fruit);
        }
    }

    public function testCollectFruits(): void
    {
        $tree = new AppleTree(1);

        $fruits = $tree->collectFruits();
        $yield = $tree->getYield();

        $this->assertCount($yield, $fruits);

        $fruits = $tree->collectFruits();
        $this->assertEmpty($fruits);
    }
}
