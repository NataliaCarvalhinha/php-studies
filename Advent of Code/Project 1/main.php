<?php

class Floor
{
    /** @var int */
    public $floor = 0;

    public function getFloorPartOne(string $input): int
    {
        $length = strlen($input);

        for ($i = 0; $i < $length; $i++) {
            if ($input[$i] == '(') {
                $this->floor++;
            } elseif ($input[$i] == ')') {
                $this->floor--;
            }
        }

        return $this->floor;
    }

    public function getFloorPartTwo(string $input): int
    {
        $length = strlen($input);
        $this->floor++;

        for ($i = 0; $i < $length; $i++) {
            if ($input[$i] == '(') {
                $this->floor++;
            } elseif ($input[$i] == ')') {
                $this->floor--;
            }
            if ($this->floor == -1) {
                return $i;
            }
        }

        return 0;
    }
}

$input = '';
$floorPartOne = new Floor;
echo $floorPartOne->getFloorPartOne($input);
echo " ";
$floorPartTwo = new Floor;
echo $floorPartTwo->getFloorPartTwo($input);

