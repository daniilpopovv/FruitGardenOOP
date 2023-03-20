<?php

declare(strict_types=1);

namespace Trees;

include_once(__DIR__ . '/../../Trees/FruitTree.php');
include_once(__DIR__ . '/../../Fruits/Fruit.php');

use Fruits\Fruit;
use PHPUnit\Framework\TestCase;

class FruitTreeTest extends TestCase
{
    public function testGetName(): void
    {
        $tree = new FruitTree(1, 'Apple Tree', rand(1, 20), rand(1, 20));

        $name = $tree->getName();

        $this->assertEquals('Apple Tree', $name);
    }

    public function testGetId(): void
    {
        $tree = new FruitTree(1, 'Apple Tree', rand(1, 20), rand(1, 20));

        $id = $tree->getId();

        $this->assertEquals(1, $id);
    }

    public function testGetYield(): void
    {
        $tree = new FruitTree(1, 'Apple Tree', 5, 5);

        $yield = $tree->getYield();

        $this->assertEquals(5, $yield);
    }

    public function testAddFruit(): void
    {
        $tree = new FruitTree(1, 'Apple Tree', rand(1, 20), rand(1, 20));
        $fruit = new Fruit('apple', 10, 10);

        $tree->addFruit($fruit);
        $fruits = $tree->collectFruits();

        $this->assertCount(1, $fruits);
        $this->assertEquals('apple', $fruits[0]->getName());
    }

    public function testCollectFruits(): void
    {
        $tree = new FruitTree(1, 'Apple Tree', rand(1, 20), rand(1, 20));
        $fruit = new Fruit('apple', 10, 10);
        $tree->addFruit($fruit);

        $fruits = $tree->collectFruits();

        $this->assertCount(1, $fruits);

        $fruits = $tree->collectFruits();
        $this->assertEmpty($fruits);
    }
}
