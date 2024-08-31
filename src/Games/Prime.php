<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGameLoop;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function play(): void
{
    $getGameData = function () {
        $question = rand(1, 101);
        isPrime($question) ? $correctAnswer = "yes" : $correctAnswer = "no";
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $getGameData);
}

function isPrime(int $question): bool
{
    if ($question < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($question); $i++) {
        if ($question % $i == 0) {
            return false;
        }
    }
    return true;
}
