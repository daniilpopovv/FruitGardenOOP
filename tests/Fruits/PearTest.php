<?php

namespace Fruits;

include_once (__DIR__.'/../../Fruits/Pear.php');

use PHPUnit\Framework\TestCase;

class PearTest extends TestCase
{
    public function testGetName(): void
    {
        $fruit = new Pear();
        $this->assertEquals('Груша', $fruit->getName());
    }

    public function testGetWeight(): void
    {
        $fruit = new Pear();
        $weight = $fruit->getWeight();

        $this->assertGreaterThanOrEqual(130, $weight);
        $this->assertLessThanOrEqual(170, $weight);
    }
}
