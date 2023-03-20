<?php

declare(strict_types=1);

namespace Fruits;

include_once('Fruit.php');

class Pear extends Fruit
{
    private int $minWeight = 130;
    private int $maxWeight = 170;

    public function __construct()
    {
        parent::__construct('Груша', $this->minWeight, $this->maxWeight);
    }
}
