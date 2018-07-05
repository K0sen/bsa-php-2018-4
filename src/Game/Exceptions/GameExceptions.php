<?php

namespace BinaryStudioAcademy\Game\Exceptions;

class GameExceptions extends \Exception
{
    public const UNKNOWN_RESOURCE  = 1;
    public const UNKNOWN_MODULE    = 2;
    public const UNKNOWN_COMMAND   = 3;
    public const UNKNOWN_ITEM      = 4;
    public const UNKNOWN_ITEM_TYPE = 5;
    public const MODULE_EXISTS     = 6;
    public const NO_SCHEME         = 7;

    /**
     * GameExceptions constructor.
     *
     * @param int  $value
     * @param null $addition
     *
     * @throws \Exception
     */
    public function __construct($value = self::UNKNOWN_COMMAND, $addition = null)
    {
        parent::__construct();

        switch ($value) {
            case self::UNKNOWN_RESOURCE:
                throw new \Exception('No such resource.');
            case self::UNKNOWN_MODULE:
                throw new \Exception('There is no such spaceship module.');
            case self::UNKNOWN_COMMAND:
                throw new \Exception('There is no command '.$addition);
            case self::UNKNOWN_ITEM:
                throw new \Exception('Storage does not contain '.$addition);
            case self::UNKNOWN_ITEM_TYPE:
                throw new \Exception('Unknown item type '.$addition);
            case self::MODULE_EXISTS:
                $addition = ucfirst($addition);
                throw new \Exception("Attention! {$addition} is ready.");
            case self::NO_SCHEME:
                throw new \Exception("No scheme for {$addition} was found");
            default:
                throw new \Exception('Unknown game error >_<');
        }
    }
}
