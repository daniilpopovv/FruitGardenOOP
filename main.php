<?php

use Gardens\FruitGarden;
use Trees\AppleTree;
use Trees\PearTree;

include_once('Gardens/FruitGarden.php');
include_once('Trees/AppleTree.php');
include_once('Trees/PearTree.php');

$beautifulGarden = new FruitGarden();

for ($i = 0; $i < 10; $i++) {
    $beautifulGarden->addTree(new AppleTree($i));
}

for ($i = 0; $i < 15; $i++) {
    $beautifulGarden->addTree(new PearTree($i));
}

$beautifulGarden->collectAllFruits();

echo("Собрано фруктов: \n");
print_r($beautifulGarden->countFruits());
echo("\nВес собранных фруктов (в граммах): \n");
print_r($beautifulGarden->calculateWeights());