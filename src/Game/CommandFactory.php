<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\{
    HelpCommand,
    ExitCommand
};
use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class CommandFactory
{
    const HELP    = 'help';
    const STATUS  = 'status';
    const BUILD   = 'build';
    const SCHEME  = 'scheme';
    const MINE    = 'mine';
    const PRODUCE = 'produce';
    const EXIT    = 'exit';

    /**
     * @param string $type
     * @return CommandInterface
     * @throws GameExceptions
     * @throws \Exception
     */
    public function createCommand(string $type): CommandInterface
    {
        switch ($type) {
            case self::HELP:
                return new HelpCommand();
            case self::STATUS:
                return new HelpCommand();
            case self::BUILD:
                return new HelpCommand();
            case self::SCHEME:
                return new HelpCommand();
            case self::MINE:
                return new HelpCommand();
            case self::PRODUCE:
                return new HelpCommand();
            case self::EXIT:
                return new ExitCommand();
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_COMMAND, $type);
        }
    }
}