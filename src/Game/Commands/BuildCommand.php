<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class BuildCommand extends AbstractCommand
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
        var_dump($this->storage->get(Storage::RESOURCE, $command));
    }
}