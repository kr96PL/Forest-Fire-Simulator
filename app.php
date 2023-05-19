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

$aliveTrees = $forest->getAliveTrees();
$burnedTrees = $forest->getBurnedTrees();

?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Forest Fire Simulator</title>
</head>
<body>
    <main>
        <h1 style="position: absolute; left: 300px;"><?=$error?></h1>
        <div>
            <div style="position: absolute; left: <?=$lightining['x'] * 10?>px; top: <?=$lightining['y'] * 10?>px; background: orange; width: 10px; height: 10px; z-index: 2;"></div>
            <?php foreach($aliveTrees as $tree) { ?>
                <div style="position: absolute; left: <?=$tree['x'] * 10?>px; top: <?=$tree['y'] * 10?>px; background: green; width: 10px; height: 10px;"></div>
            <?php } ?>
            <?php foreach($burnedTrees as $tree) { ?>
                <div style="position: absolute; left: <?=$tree['x'] * 10?>px; top: <?=$tree['y'] * 10?>px; background: red; width: 10px; height: 10px; z-index: 1;"></div>
            <?php } ?>
        </div>
    </main>
</body>
</html>