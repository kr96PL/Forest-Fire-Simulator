<?php 

require_once './Forest.php';

class SimulateFire
{
    public function __construct(private Forest $forest, private array $lightining) {}

    public function run()
    {
        $tree = $this->forest->getTreeByCoords($this->lightining['x'], $this->lightining['y']);
        if (!$tree) {
            return false;
        }

        $this->forest->burnTree($tree);

        return true;
    }
}