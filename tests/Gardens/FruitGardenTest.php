<?php

namespace Gardens;

include_once(__DIR__ . '/../../Gardens/FruitGarden.php');
include_once(__DIR__ . '/../../Trees/AppleTree.php');
include_once(__DIR__ . '/../../Trees/PearTree.php');

use Fruits\Apple;
use Fruits\Fruit;
use PHPUnit\Framework\TestCase;
use Trees\AppleTree;
use Trees\FruitTree;
use Trees\PearTree;

class FruitGardenTest extends TestCase
{
    public function testAddTree()
    {
        $garden = new FruitGarden();
        $garden->addTree(new AppleTree(1));
        $garden->addTree(new PearTree(1));
        $appleTree = $garden->getTrees()[0];
        $pearTree = $garden->getTrees()[1];
        $trees = $garden->getTrees();

        $this->assertInstanceOf(AppleTree::class, $appleTree);
        $this->assertInstanceOf(PearTree::class, $pearTree);
        $this->assertSame([$appleTree, $pearTree], $garden->getTrees());
        $this->assertCount(2, $trees);
    }

    public function testGetTrees()
    {
        $garden = new FruitGarden();
        $garden->addTree(new AppleTree(1));
        $garden->addTree(new PearTree(1));
        $trees = $garden->getTrees();

        $this->assertCount(2, $trees);
    }

    public function testCollectAllFruits()
    {
        $garden = new FruitGarden();
        $garden->addTree(new AppleTree(1));
        $garden->addTree(new PearTree(1));
        $trees = $garden->getTrees();

        $garden->collectAllFruits();
        $fruits = $garden->getCollectedFruits();

        $this->assertNotEmpty($fruits);
        foreach ($trees as $tree) {
            $this->assertEmpty($tree->collectFruits());
        }
    }

    public function testGetCollectedFruits()
    {
        $garden = new FruitGarden();
        $garden->addTree(new AppleTree(1));

        $garden->collectAllFruits();
        $fruits = $garden->getCollectedFruits();

        $this->assertNotEmpty($fruits);
        foreach ($fruits as $fruit) {
            $this->assertInstanceOf(Apple::class, $fruit);
        }
    }

    public function testCalculateWeights()
    {
        $garden = new FruitGarden();

        $tree1 = new FruitTree(1, 'Apple Tree', 2, 2);
        $fruit1 = new Fruit('Apple', 5, 5);
        for ($i = 0; $i < $tree1->getYield(); $i++) {
            $tree1->addFruit($fruit1);
        }
        $garden->addTree($tree1);

        $tree2 = new FruitTree(1, 'Pear Tree', 3, 3);
        $fruit2 = new Fruit('Pear', 7, 7);
        for ($i = 0; $i < $tree2->getYield(); $i++) {
            $tree1->addFruit($fruit2);
        }
        $garden->addTree($tree2);

        $garden->collectAllFruits();
        $weights = $garden->calculateWeights();

        $sumWeights= $weights['Apple'] + $weights['Pear'];
        $this->assertEquals(31, $sumWeights);
    }

    public function testCountFruits()
    {
        $garden = new FruitGarden();

        $tree1 = new FruitTree(1, 'Apple Tree', 2, 2);
        $fruit1 = new Fruit('Apple', 5, 5);
        for ($i = 0; $i < $tree1->getYield(); $i++) {
            $tree1->addFruit($fruit1);
        }
        $garden->addTree($tree1);

        $tree2 = new FruitTree(1, 'Pear Tree', 3, 3);
        $fruit2 = new Fruit('Pear', 7, 7);
        for ($i = 0; $i < $tree2->getYield(); $i++) {
            $tree1->addFruit($fruit2);
        }
        $garden->addTree($tree2);

        $garden->collectAllFruits();
        $amounts = $garden->countFruits();

        $sumAmount= $amounts['Apple'] + $amounts['Pear'];
        $this->assertEquals(5, $sumAmount);
    }
}
