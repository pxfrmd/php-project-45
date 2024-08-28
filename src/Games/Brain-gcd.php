<?php

namespace BrainGames\GCD;

use function BrainGames\engine\runGameLoop;

const RULES = "Find the greatest common divisor of given numbers.";


function play()
{
    $getGameData = function () {
        $firstOperand = rand(0, 101);
        $secondOperand = rand(0, 101);
        $question = "$firstOperand $secondOperand";
        $correctAnswer = findingCorrectGCD($firstOperand, $secondOperand);
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $getGameData);
}

function findingCorrectGCD(int $firstOperand, int $secondOperand): int
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
