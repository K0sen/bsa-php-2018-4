<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\{
    BuildCommand, HelpCommand, ExitCommand, MineCommand, ProduceCommand, SchemeCommand, StatusCommand
};
use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class CommandFactory
{
    protected $storage;

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
                return new HelpCommand();
            case CommandInterface::STATUS:
                return new StatusCommand($this->storage);
            case CommandInterface::BUILD:
                return new BuildCommand($this->storage);
            case CommandInterface::SCHEME:
                return new SchemeCommand($this->storage);
            case CommandInterface::MINE:
                return new MineCommand($this->storage);
            case CommandInterface::PRODUCE:
                return new ProduceCommand($this->storage);
            case CommandInterface::EXIT:
                return new ExitCommand();
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_COMMAND, $type);
        }
    }
}