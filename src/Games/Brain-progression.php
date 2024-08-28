<?php

namespace BrainGames\progression;

use function BrainGames\engine\runGameLoop;

const RULES = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function play()
{
    $getGameData = function () {
        $questionArr = [];
        $randomMinNumber = rand(0, 20); // подобные штуки считаются магическими числами? название переменной вполне говорящее что к чему
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
