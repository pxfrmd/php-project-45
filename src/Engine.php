<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runGameLoop(string $rules, callable $getGameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name");
    line($rules);
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        [$correctAnswer, $question] = $getGameData();
        line("Question: $question");
        $answer = prompt("Your answer");
        if ($answer != $correctAnswer){
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
        line("Correct!");
        if (NUMBER_OF_ROUNDS - 1 == $i) {
            line("Congratulations, $name!");
            return;
        }
    } 
}
