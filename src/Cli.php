<?php

namespace BrainGames\CLI;

use function сli\line;
use function сli\prompt;

function welcome ():void
{
line('Welcome to the Brain Game!');
$name = prompt('May I have your name?');
line("Hello, %s!", $name);
}