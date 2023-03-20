<?php

namespace Trees;

include_once(__DIR__ . '/../../Trees/PearTree.php');

use Fruits\Pear;
use PHPUnit\Framework\TestCase;

class PearTreeTest extends TestCase
{
    public function testGetName(): void
    {
        $tree = new PearTree(1);

        $name = $tree->getName();

        $this->assertEquals('Pear Tree', $name);
    }

    public function testGetId(): void
    {
        $tree = new PearTree(1);

        $id = $tree->getId();

        $this->assertEquals(1, $id);
    }

    public function testGetYield(): void
    {
        $tree = new PearTree(1);

        $yield = $tree->getYield();

        $this->assertIsInt($yield);
        $this->assertGreaterThanOrEqual(0, $yield);
        $this->assertLessThanOrEqual(20, $yield);
    }

    public function testFruit(): void
    {
        $tree = new PearTree(1);

        foreach ($tree->collectFruits() as $fruit) {
            $this->assertInstanceOf(Pear::class, $fruit);
        }
    }

    public function testCollectFruits(): void
    {
        $tree = new PearTree(1);

        $fruits = $tree->collectFruits();
        $yield = $tree->getYield();

        $this->assertCount($yield, $fruits);

        $fruits = $tree->collectFruits();
        $this->assertEmpty($fruits);
    }
}
