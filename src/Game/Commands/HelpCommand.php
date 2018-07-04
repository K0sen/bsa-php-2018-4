<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Io\CliWriter as Writer;

class HelpCommand implements CommandInterface
{
    public $writer;

    public function __construct()
    {
        $this->writer = new Writer();
    }

    public function execute(string $string = ''): void
    {
        $this->writer->writeln('Hello');
    }
}