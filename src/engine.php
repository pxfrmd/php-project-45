<?php
namespace BrainGames\engine;
use function Cli\line;
use function Cli\prompt;


function welcome($rules): string
{
    $name = "";
    line('Welcome to the Brains Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rules);
    return $name;
}

function engine($rules, callable $gameData): void
{   
    $name = welcome($rules);
    $numberOfRounds = 3;
    while ($numberOfRounds > 0) {
        [$correctAnswer, $question] = $gameData();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer == $correctAnswer) {
            line ("Correct!");
            $numberOfRounds--;
            if ($numberOfRounds === 0) {
                line("Congratulations, $name!");
                exit;
            }
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            $numberOfRounds = 0;
            line ("Let's try again, $name");
            exit;
        }
    }
}


