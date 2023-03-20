<?php

declare(strict_types=1);

namespace Trees;

include_once('FruitTree.php');
include_once(__DIR__ . '/../Fruits/Pear.php');

use Fruits\Pear;

class PearTree extends FruitTree
{
    private int $minYield = 0;
    private int $maxYield = 20;

    public function __construct($id)
    {
        parent::__construct($id, 'Pear Tree', $this->minYield, $this->maxYield);

        for ($i = 0; $i < $this->getYield(); $i++) {
            $this->addFruit(new Pear());
        }
    }
}
