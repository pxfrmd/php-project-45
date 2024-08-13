<?php

namespace BrainGames\Cli;

use function сli\line;
use function сli\prompt;

function welcome()
{
line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
}