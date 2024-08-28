<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

function welcome(string $rules): string
{
    $name = "";
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);
    return $name;
}

function engine(string $rules, callable $gameData): void
{
    $name = welcome($rules);
    $numberOfRounds = 3;
    while ($numberOfRounds > 0) {
        [$correctAnswer, $question] = $gameData();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line("Correct!");
            $numberOfRounds--;
            if ($numberOfRounds === 0) {
                line("Congratulations, $name!");
                exit;
            }
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            $numberOfRounds = 0;
            line("Let's try again, $name!");
            exit;
        }
    }
}
