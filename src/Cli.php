<?php

namespace BrainGames\Cli;

use function Cli\line;
use function Cli\prompt;

function welcome(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
