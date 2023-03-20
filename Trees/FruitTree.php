<?php

declare(strict_types=1);

namespace Trees;

use Fruits\Fruit;

class FruitTree
{
    private int $id;
    private string $name;
    private int $yield;
    private array $fruits = [];

    public function __construct(
        int $id,
        string $name,
        int $minYield,
        int $maxYield
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->yield = rand($minYield, $maxYield);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getYield(): int
    {
        return $this->yield;
    }

    public function addFruit(Fruit $fruit): void
    {
        $this->fruits[] = $fruit;
    }

    // ВАЖНО. После сбора фруктов с дерева, они действительно с него пропадают
    public function collectFruits(): array
    {
        $collectedFruits = $this->fruits;
        $this->fruits = [];
        return $collectedFruits;
    }
}
