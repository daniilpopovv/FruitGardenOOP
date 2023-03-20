<?php

declare(strict_types=1);

namespace Gardens;

use Trees\FruitTree;

class FruitGarden
{
    private array $fruitTrees = [];
    private array $collectedFruits = [];

    public function addTree(FruitTree $fruitTree): void
    {
        $this->fruitTrees[] = $fruitTree;
    }

    public function getTrees(): array
    {
        return $this->fruitTrees;
    }

    public function getCollectedFruits(): array
    {
        return $this->collectedFruits;
    }

    public function collectAllFruits(): void
    {
        $collectedFruits = [];

        foreach ($this->fruitTrees as $fruitTree) {
            foreach ($fruitTree->collectFruits() as $collectedFruit) {
                $collectedFruits[] = $collectedFruit;
            }
        }

        $this->collectedFruits = $collectedFruits;
    }

    // Прежде чем посчитать фрукты, их нужно собрать collectAllFruits()
    public function countFruits(): array
    {
        $fruitCounts = [];

        foreach ($this->collectedFruits as $fruit) {
            $fruitName = $fruit->getName();
            if (!isset($fruitCounts[$fruitName])) {
                $fruitCounts[$fruitName] = 0;
            }
            $fruitCounts[$fruitName]++;
        }

        return $fruitCounts;
    }

    // Прежде чем посчитать вес фруктов, их нужно собрать collectAllFruits()
    public function calculateWeights(): array
    {
        $fruitWeights = [];

        foreach ($this->collectedFruits as $fruit) {
            $fruitName = $fruit->getName();
            if (!isset($fruitWeights[$fruitName])) {
                $fruitWeights[$fruitName] = 0;
            }
            $fruitWeights[$fruitName] += $fruit->getWeight();
        }

        return $fruitWeights;
    }
}
