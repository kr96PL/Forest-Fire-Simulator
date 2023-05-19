<?php 

require_once './Tree.php';

class Forest 
{
    private array $trees = [];

    public function addTree(Tree $tree) {
        $this->trees[] = $tree;
    }

    public function getTrees(): array 
    {
        return $this->trees;
    }

    public function getAliveTrees(): array 
    {
        $result = [];
        foreach ($this->trees as $tree) {
            if ($tree->getStatus() === 'ALIVE') {
                $result[] = $tree->getCoords();
            }
        }
        return $result;
    }

    public function getBurnedTrees(): array 
    {
        $result = [];
        foreach ($this->trees as $tree) {
            if ($tree->getStatus() === 'BURNED') {
                $result[] = $tree->getCoords();
            }
        }
        return $result;
    }

    public function getTreeByCoords(int $x, int $y): Tree|bool
    {
        foreach ($this->trees as $tree) {
            if (($tree->getCoords())['x'] === $x && ($tree->getCoords())['y'] === $y) {
                return $tree;
            }
        }
        return false;
    }

    public function burnTree(Tree $tree)
    {
        if ($tree->getStatus() === 'BURNED') {
            return;
        }
        $neighboursTrees = $tree->getNeighboursTrees();
        if ($neighboursTrees) {
            $tree->isBurning();
            foreach ($neighboursTrees as $neighboursTree) {
                $this->burnTree($neighboursTree);
            }
        } else {
            return false;
        }
    }
}