<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Storage;

class MineCommand extends AbstractCommand
{
    private const MINE_RESOURCES = [
        Storage::FIRE,
        Storage::SAND,
        Storage::IRON,
        Storage::SILICON,
        Storage::COPPER,
        Storage::CARBON,
        Storage::WATER,
        Storage::FUEL,
    ];

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
        if (!\in_array($command, self::MINE_RESOURCES, true)) {
            new GameExceptions(GameExceptions::UNKNOWN_RESOURCE);
        }

        $this->storage->put(Storage::RESOURCE, $command);
        $resourceName = ucfirst($command);
        $this->writer->writeln("{$resourceName} added to inventory.");
    }
}