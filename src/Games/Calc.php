<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGameLoop;

const RULES = 'What is the result of the expression?';

function play(): void
{
    $getGameData = function () {
        $firstOperand = rand(0, 101);
        $secondOperand = rand(0, 101);
        $operatorsArr = ["+", "-", "*"];
        $operator = $operatorsArr[rand(0, 2)];
        $question = "$firstOperand $operator $secondOperand";
        $correctAnswer = match ($operator) {
            "+" => $firstOperand + $secondOperand,
            "-" => $firstOperand - $secondOperand,
            "*" => $firstOperand * $secondOperand,
            default => null,
        };
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $getGameData);
}

