<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Io\CliWriter as Writer;

class ExitCommand implements CommandInterface
{
    public $writer;

    public function __construct()
    {
        $this->writer = new Writer();
    }

    public function execute(string $string = ''): void
    {
        $this->writer->writeln('The pieces of your ship flew the space
and eventually got on the inhabited planet and destroyed the race living there');
        exit;
    }
}