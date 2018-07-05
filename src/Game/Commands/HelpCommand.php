<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;

class HelpCommand extends AbstractCommand
{
    /**
     * @param string $command
     */
    public function execute(string $command = ''): void
    {
        foreach ($this->getAvailableCommands() as $command) {
            $this->writer->writeln($command);
        }
    }
}