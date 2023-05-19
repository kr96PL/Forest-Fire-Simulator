<?php 

require_once './SimulateFire.php';
require_once './ForestFactory.php';
require_once './Tree.php';

$error = null;
$forest = ForestFactory::create(200);
$lightining = ['x' => rand(0, 20), 'y' => rand(0, 20)];

$simulation = new SimulateFire($forest, $lightining);

if (!$simulation->run()) {
    $error = 'Thunder missed';
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'thunder' => $lightining,
    'aliveTrees' => $forest->getAliveTrees(),
    'burnedTrees' => $forest->getBurnedTrees()
]);
die();

