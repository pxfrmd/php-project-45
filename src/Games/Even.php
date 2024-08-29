<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGameLoop;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function play(): void
{
    $getGameData = function () {
        $question = rand(0, 100);
        isEven($question) ? $correctAnswer = "yes" : $correctAnswer = "no";
        return [$correctAnswer, $question];
    };
        runGameLoop(RULES, $getGameData);
}


function isEven(int $question): bool
{
    return $question % 2 === 0 ? true : false;
}
