<?php
namespace logic;
use function Cli\line;
use function Cli\prompt;

$name = "";
$count = 0;
function welcome(): string
{
    global $name;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}


function brainEven(): void
{   
    global $count;
    global $name;
    while ($count < 3) {
        $randomNumber = rand(1, 100);
        echo "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
        echo "Question: {$randomNumber}\n";
        $typeOfRandomNumberIsEven = "yes";
        if ($randomNumber % 2 !=0) {
            $typeOfRandomNumberIsEven = "no";
        }
        $answer = prompt("Your answer");
        $answerCleaned = strtolower($answer);
        if ($typeOfRandomNumberIsEven != $answerCleaned) {
            echo "\"{$answerCleaned}\" is wrong answer ;(. Correct answer was \"{$typeOfRandomNumberIsEven}\". Let's try again, {$name}\n";
            $count = 3;
        } else {
            echo "Correct!\n";
            $count++;
            if ($count == 3) {
                echo "Congratulations, {$name}!\n";
            }
        }
    }
}
welcome();
brainEven();
