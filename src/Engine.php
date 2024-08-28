<?php

namespace BrainGames\engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runGameLoop(string $rules, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name");
    line($rules);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        [$correctAnswer, $question] = $gameData();
        line("Question: $question");
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line("Correct!");
            if ($i == 2 && $answer == $correctAnswer) {
                line("Congratulations, $name!");
                return;
            }
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
    }
}
