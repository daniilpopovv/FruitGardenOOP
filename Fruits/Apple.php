<?php

declare(strict_types=1);

namespace Fruits;

include_once('Fruit.php');

class Apple extends Fruit
{
    private int $minWeight = 150;
    private int $maxWeight = 180;

    public function __construct()
    {
        parent::__construct('Яблоко', $this->minWeight, $this->maxWeight);
    }
}
