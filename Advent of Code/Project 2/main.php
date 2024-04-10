<?php

use function PHPSTORM_META\map;

class Gift
{
    /** @var int */
    public $paper = 0;

    /** @var int */
    public $ribbon = 0;

 
    public function giftPaper(string $input): int
    {
        $fileHandle = fopen($input, 'r');

        while (($line = fgets($fileHandle)) !== false) {
            $parts  = explode("x", $line);
            $length = $parts[0];
            $width  = $parts[1];
            $height = $parts[2];

            $side1 = 2 * $length * $width;
            $side2 = 2 * $width  * $height;
            $side3 = 2 * $length * $height;

            $min = min($side1, $side2, $side3)/2;

            $this->paper = $this->paper + $side1 + $side2 + $side3 + $min;
        }
        
        fclose($fileHandle);

        return $this->paper;
    }

    public function giftRibbon(string $input): int
    {
        $fileHandle = fopen($input, 'r');

        while (($line = fgets($fileHandle)) !== false) {

            $parts  = explode("x", $line);

            $length = $parts[0];
            $width  = $parts[1];
            $height = $parts[2];

            $bow = $length * $width * $height;

            $sides = [$length, $width, $height];
            sort($sides);
           
    
            $this->ribbon = $this->ribbon + 2 * ($sides[0] + $sides[1]) + $bow;       
        }
        
        fclose($fileHandle);

        return $this->ribbon;
    }


}

$input = 'gift.txt';
$gift = new Gift;
echo $gift->giftPaper($input);
echo ' ';
echo $gift->giftRibbon($input);
