<?php

namespace BrainGames\Calc;

use function BrainGames\engine\runGameLoop;

const RULES = 'What is the result of the expression?';

function play()
{
    $getGameData = function () {
        $firstOperand = rand(0, 101);
        $secondOperand = rand(0, 101);
        $operatorsArr = ["+", "-", "*"];
        $operator = $operatorsArr[rand(0, 2)];
        $question = "$firstOperand $operator $secondOperand";
        $correctAnswer = returnResult($firstOperand, $operator, $secondOperand);
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $getGameData);
}
function returnResult(int $firstOperand, string $operator, int $secondOperand): int
{
    switch (true) {
        case $operator === "+":
            return $firstOperand + $secondOperand;
        case $operator === "-":
            return $firstOperand - $secondOperand;
        case $operator === "*":
            return $firstOperand * $secondOperand;
        default:
            return 0;
    }
}
