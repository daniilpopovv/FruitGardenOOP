<?php

declare(strict_types=1);

namespace Fruits;

include_once(__DIR__ . '/../../Fruits/Apple.php');

use PHPUnit\Framework\TestCase;

class AppleTest extends TestCase
{
    public function testGetName(): void
    {
        $fruit = new Apple();
        $this->assertEquals('Яблоко', $fruit->getName());
    }

    public function testGetWeight(): void
    {
        $fruit = new Apple();
        $weight = $fruit->getWeight();

        $this->assertGreaterThanOrEqual(150, $weight);
        $this->assertLessThanOrEqual(180, $weight);
    }
}
