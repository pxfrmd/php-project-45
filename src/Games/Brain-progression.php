<?php

namespace BrainGames\progression;

use function BrainGames\engine\runGameLoop;

const RULES = "What number is missing in the progression?";

function play()
{
    $gameData = function () {
        $questionArr = [];
        $randomMinNumber = rand(0, 20);
        $randomProgressionStep = rand(2, 7);
        for ($i = 0; $i < 10; $i++) {
            $questionArr[$i] = $randomMinNumber;
            $randomMinNumber = $randomMinNumber + $randomProgressionStep;
        }
        $indexOfMysteryNumber = rand(0, 9);
        $correctAnswer = $questionArr[$indexOfMysteryNumber];
        $questionArr[$indexOfMysteryNumber] = "..";
        $question = implode(" ", $questionArr);
        return [$correctAnswer, $question];
    };
    runGameLoop(RULES, $gameData);
}
