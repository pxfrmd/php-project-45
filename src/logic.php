<?php
namespace logic;
use function Cli\line;
use function Cli\prompt;

$name;

function welcome(): void
{
    line('Welcome to the Brain Game!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

$count = 0;
function brainEven(): void
{   
    $randomNumber = rand(0, 100);
    echo "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    echo "Question: {$randomNumber}";
    $typeOfRandomNumberIsEven = "yes";
    if ($typeOfRandomNumberIsEven % 2 !=0) {
        $typeOfRandomNumberIsEven = "no";
    }
    $answer = prompt("Your answer:");
    $answerCleaned = strtolower($answer).trim($answer);
    if ($typeOfRandomNumberIsEven != $answerCleaned) {
        echo "\"{$answerCleaned}\" is wrong answer ;(. Correct answer was \"{$typeOfRandomNumberIsEven}\". Let's try again, Bill!";
        global $count;
        global $name;
        $count = 3;
    } else {
        echo "Correct!";
        $count++;
        if ($count == 3) {
            echo "Congratulations, {$name}!";
        }
    }
    
}


