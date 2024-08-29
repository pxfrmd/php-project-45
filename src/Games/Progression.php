<?php

namespace BrainGames\progression;

use function BrainGames\Engine\runGameLoop;

const RULES = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function play(): void
{
    $getGameData = function () {
        $questionArr = [];
        $randomMinNumber = rand(0, 20);
        $randomProgressionStep = rand(2, 7);
        for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
            $questionArr[$i] = $randomMinNumber;
            $randomMinNumber = $randomMinNumber + $randomProgressionStep;
        }
        $indexOfMysteryNumber = rand(0, 9);
        $correctAnswer = $questionArr[$indexOfMysteryNumber];
        $questionArr[$indexOfMysteryNumber] = "..";
        $question = implode(" ", $questionArr);
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $getGameData);
}
