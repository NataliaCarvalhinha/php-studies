<?php

class Map {
    /** @var array */
    public $visited = array();

    function printVisited() {
        foreach ($this->visited as $line) {
            foreach ($line as $element) {
                echo $element . " ";
            }
            echo "\n";
        }
        echo "\n";
    }

    public function countTrue() {
        $count = 0;
        foreach ($this->visited as $line) {
            foreach ($line as $element) {
                if ($element === true) {
                    $count++;
                }
            }
        }
        return $count;
    }
    
    public function alreadyPassed($directions) {
        $x = 0;
        $y = 0;
        
        $this->visited[$x][$y] = true;
    
        foreach ($directions as $direction) {
            switch ($direction) {
                case '<':
                    $x--;
                    break;
                case '>':
                    $x++;
                    break;
                case '^':
                    $y--;
                    break;
                case 'v':
                    $y++;
                    break;
            }
            $this->visited[$x][$y] = true;
        }
    }

    public function santaAndRobot($directions){
        $santa = array();
        $robot = array();

        foreach($directions as $i => $direction){
            if ($i % 2 == 0){
                $robot[] = $direction;
            }
            else{
                $santa[] = $direction;
            }
        }


        $this->alreadyPassed($santa);
        $this->alreadyPassed($robot);
        $this->printVisited($this->visited);
        $count = $this->countTrue($this->visited);

        return $count;
    }
}

$input = 'input.txt';
$fileHandle = fopen($input, 'r');
$directions = str_split(trim(fgets($fileHandle)));

$map = new Map;
$map->alreadyPassed($directions);
$map->printVisited($map->visited);
$resultPartOne = $map->countTrue();
echo "Part One : $resultPartOne \n";


$map2 = new Map;
$resultPartTwo = $map2->santaAndRobot($directions);
echo "Part Two : $resultPartTwo \n";



?>
