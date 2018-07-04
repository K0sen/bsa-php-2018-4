<?php

namespace BinaryStudioAcademy\Game\Exceptions;


class GameExceptions extends \Exception
{
    const UNKNOWN_RESOURCE  = 1;
    const UNKNOWN_COMPONENT = 2;
    const UNKNOWN_COMMAND   = 3;

    /**
     * GameExceptions constructor.
     * @param int $value
     * @param null $addition
     * @throws \Exception
     */
    public function __construct($value = self::UNKNOWN_COMMAND, $addition = null) {

        switch ($value) {
            case self::UNKNOWN_RESOURCE:
                throw new \Exception('No such resource.');
                break;

            case self::UNKNOWN_COMPONENT:
                throw new \Exception('There is no such spaceship module.');
                break;

            case self::UNKNOWN_COMMAND:
                throw new \Exception('There is no command '. $addition);
                break;

            default:
                throw new \Exception('Unknown game error >_<');
                break;
        }
    }
}