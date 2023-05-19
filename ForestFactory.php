<?php 

require_once './Forest.php';
require_once './Tree.php';

class ForestFactory {
    public static function create(int $num) {
        $forest = new Forest();
        for ($i = 0; $i < $num; $i++) {
            $x = rand(0, 20);
            $y = rand(0, 20);
            $tree = new Tree($forest, $x, $y);
            $forest->addTree($tree);
        }

        return $forest;
    }
}