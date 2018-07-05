<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class StatusCommand extends AbstractCommand
{
    public $storage;

    /**
     * SchemeCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct();

        $this->storage = $storage;
    }

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