<?php

namespace BrainGames\Even;

use function BrainGames\engine\engine;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function play()
{
    $gameData = function () {
      $question = rand(0, 100);
      $correctAnswer = isEven($question);
      $gameData = [$correctAnswer, $question];
      return $gameData;
    };
    engine(RULES, $gameData);
}

function isEven($question)
{
  if ($question % 2 === 0) {
    return "yes";
  } else {
     return "no";
    }
}
