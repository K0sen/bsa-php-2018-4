<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class HelpCommand extends AbstractCommand
{
    /**
     * HelpCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct($storage);
    }

    /**
     * @param string $command
     */
    public function execute(string $command = ''): void
    {
        foreach ($this->getAvailableCommands() as $command) {
            $this->message = $command;
        }
    }
}