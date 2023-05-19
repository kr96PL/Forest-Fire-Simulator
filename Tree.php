<?php 

require_once './Forest.php';

class Tree 
{
    private string $status = "ALIVE";

    public function __construct(private ?Forest $forest = null, private int $x, private int $y) {

    }

    public function getCoords(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y
        ];
    }

    public function isBurning(): void
    {
        $this->status = "BURNED";
    }

    public function getStatus(): string 
    {
        return $this->status;
    }

    private function getNeighboursCoords()
    {
        for ($i = $this->x - 1; $i <= $this->x + 1; $i++) {
            for ($j = $this->y - 1; $j <= $this->y + 1; $j++) {
                if ($this->x === $i && $this->y === $j) {
                    // do nothing
                } else {
                    $result[] = [
                        'x' => $i,
                        'y' => $j
                    ];
                }
            }
        }
        return $result;
    }

    public function getNeighboursTrees(): array
    {
        $neighboursTrees = [];
        $neighboursCoords = $this->getNeighboursCoords();

        foreach ($neighboursCoords as $cord) {
            $neighbourTree = $this->forest->getTreeByCoords($cord['x'], $cord['y']);
            if ($neighbourTree) {
                $neighboursTrees[] = $neighbourTree;
            }
        }

        return $neighboursTrees;
    }
}