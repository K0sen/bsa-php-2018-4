<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Io\CliWriter;

abstract class AbstractCommand implements CommandInterface
{
    protected $writer;

    public function __construct()
    {
        $this->writer = new CliWriter();
    }

    abstract public function execute(string $command = '');
}