<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Commands\{
    BuildCommand, HelpCommand, ExitCommand, MineCommand, SchemeCommand, StatusCommand
};
use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Storage;

class CommandFactory
{
    private $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param string $type
     * @return CommandInterface
     * @throws GameExceptions
     * @throws \Exception
     */
    public function createCommand(string $type): CommandInterface
    {
        switch ($type) {
            case CommandInterface::HELP:
                return new HelpCommand($this->storage);
            case CommandInterface::STATUS:
                return new StatusCommand($this->storage);
            case CommandInterface::SCHEME:
                return new SchemeCommand($this->storage);
            case CommandInterface::MINE:
                return new MineCommand($this->storage);
            case CommandInterface::PRODUCE:
                return new BuildCommand($this->storage, AbstractComponent::RESOURCE);
            case CommandInterface::BUILD:
                return new BuildCommand($this->storage, AbstractComponent::MODULE);
            case CommandInterface::EXIT:
                return new ExitCommand($this->storage);
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_COMMAND, $type);
        }
    }
}