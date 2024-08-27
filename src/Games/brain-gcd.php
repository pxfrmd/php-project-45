<?php

namespace BrainGames\GCD;
use function BrainGames\engine\engine;

const RULES = "Find the greatest common divisor of given numbers.";


function play()
{
    $gameData = function() {
        $firstOperand = rand(0, 101);
        $secondOperand = rand(0, 101);
        $question = $firstOperand ." ". $secondOperand;
        $correctAnswer = findingCorrectGCD($firstOperand, $secondOperand);
        $gameData = [$correctAnswer, $question];
        return $gameData;
    };
    engine(RULES, $gameData);
}

function findingCorrectGCD($firstOperand, $secondOperand)
{
    while (($firstOperand > 0) && ($secondOperand > 0)) {
        if ($firstOperand >= $secondOperand) {
            $firstOperand = $firstOperand % $secondOperand;
        } else {
            $secondOperand = $secondOperand % $firstOperand;
        }
    }
    return max($firstOperand, $secondOperand);
}



