<?php

declare(strict_types=1);

namespace Fruits;

class Fruit
{
    private string $name;
    private int $weight;

    public function __construct(string $name, int $minWeight, int $maxWeight)
    {
        $this->name = $name;
        $this->weight = rand($minWeight, $maxWeight);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }
}
