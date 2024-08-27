<?php
namespace BrainGames\Calc;
use function BrainGames\engine\engine;

const RULES = 'What is the result of the expression?';

function play()
{
    $gameData = function() {
        $firstOperand = rand(0, 101);
        $secondOperand = rand(0, 101);
        $operatorsArr = ["+", "-", "*"];
        $operator = $operatorsArr[rand(0, 2)];
        $question = $firstOperand ." ". $operator . " " . $secondOperand; 
        $correctAnswer = operationResult ($firstOperand, $operator, $secondOperand);
        $gameData = [$correctAnswer, $question];
        return $gameData;
    };
    engine(RULES, $gameData);
}
function operationResult($firstOperand, $operator, $secondOperand) {
    switch ($operator) {
        case $operator === "+":
            return $firstOperand + $secondOperand;
        case $operator === "-":
            return $firstOperand - $secondOperand; 
        case $operator === "*":
            return $firstOperand * $secondOperand;    
    }
}
