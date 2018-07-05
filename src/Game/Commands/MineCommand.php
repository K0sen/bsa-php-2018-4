<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class MineCommand extends AbstractCommand
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
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        $this->storage->put(Storage::RESOURCE, $command);
        $resourceName = ucfirst($command);
        $this->writer->writeln("{$resourceName} added to inventory.");
    }
}