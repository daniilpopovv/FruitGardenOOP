<?php

declare(strict_types=1);

namespace Fruits;

include_once(__DIR__ . '/../../Fruits/Fruit.php');

use PHPUnit\Framework\TestCase;

class FruitTest extends TestCase
{
    public function testGetName(): void
    {
        $fruit = new Fruit('apple', 100, 200);
        $this->assertEquals('apple', $fruit->getName());
    }

    public function testGetWeight(): void
    {
        $fruit = new Fruit('apple', 50, 50);
        $weight = $fruit->getWeight();

        $this->assertEquals(50, $weight);
    }
}
