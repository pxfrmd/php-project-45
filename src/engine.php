<?php
namespace engine;
use function Cli\line;
use function Cli\prompt;


function welcome($rules): string
{
    $name = "";
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line(RULES);
    return $name;
}

function engine($rules, $gameData): void
{   
    $name = welcome(RULES);
    $numberOfRounds = 3;
    [$corectAnswer, $question] = $gameData;
    while ($numberOfRounds > 0) {
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer == $corectAnswer) {
            echo "Correct!";
            $numberOfRounds--;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%d'.", $answer, $corectAnswer);
            $numberOfRounds = 0;
            line ("Let's try again, %s", $name);
        }
    }
}


