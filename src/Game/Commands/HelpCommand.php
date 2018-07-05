<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;

class HelpCommand extends AbstractCommand
{
    /**
     * @param string $command
     * @throws \ReflectionException
     */
    public function execute(string $command = ''): void
    {
        $refl = new \ReflectionClass(self::class);
        $this->writer->writeln('Evailable commands: ');
        foreach ($refl->getConstants() as $constant) {
            $this->writer->writeln($constant);
        }
    }
}