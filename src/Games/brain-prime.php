<?php

namespace BrainGames\prime;

use function BrainGames\engine\engine;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function play()
{
    $gameData = function() {
        $question = rand(2, 101);
        $correctAnswer = isPrime($question);
        $gameData = [$correctAnswer, $question];
        return $gameData;
    };
    engine(RULES, $gameData);
}

function isPrime($question)
{
    for ($i = 2; $i <= sqrt($question); $i++){
        if ($question % $i == 0) {
            return "no";
        }
    }   
    return "yes";
}