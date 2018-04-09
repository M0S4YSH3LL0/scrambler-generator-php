<?php

require_once('Scrambler.class.php');

$scrambler = new Scrambler();
$scrambler->setLength(15);
$scrambler->setDoubleChance(20);
$scrambler->setPrimeChance(15);

echo $scrambler->generate() . PHP_EOL;
