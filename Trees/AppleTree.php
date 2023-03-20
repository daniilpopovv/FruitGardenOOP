<?php

declare(strict_types=1);

namespace Trees;

include_once('FruitTree.php');
include_once(__DIR__ . '/../Fruits/Apple.php');

use Fruits\Apple;

class AppleTree extends FruitTree
{
    private int $minYield = 40;
    private int $maxYield = 50;

    public function __construct($id)
    {
        parent::__construct($id, 'Apple Tree', $this->minYield,
            $this->maxYield);
        for ($i = 0; $i < $this->getYield(); $i++) {
            $this->addFruit(new Apple());
        }
    }
}
