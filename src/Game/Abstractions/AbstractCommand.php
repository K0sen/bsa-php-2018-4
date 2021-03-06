<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Builder;
use BinaryStudioAcademy\Game\ChiefEngineer;
use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Factories\ComponentFactory;
use BinaryStudioAcademy\Game\Factories\SchemeFactory;
use BinaryStudioAcademy\Game\Storage;

abstract class AbstractCommand implements CommandInterface
{
    protected const COMMAND_DESCRIBE = [
        self::HELP => "'help' - shows available commands",
        self::STATUS => "'status' - shows info about amount of available resources and what needed modules",
        self::BUILD => "'build:<spaceship_module>' - builds ship module",
        self::SCHEME => "'scheme:<spaceship_module>' - shows scheme of module - list of needed components",
        self::MINE => "'mine:<resource_name>' - adds resource unit to storage",
        self::PRODUCE => "'produce:<combined_resource>' - produces combine resources",
        self::EXIT => "'exit' - stops the game"
    ];

    protected $storage;
    protected $message;
    protected $schemeFactory;
    protected $componentFactory;
    protected $chiefEngineer;

    protected $builder;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
        $this->schemeFactory = new SchemeFactory();
        $this->componentFactory = new ComponentFactory();
        $this->chiefEngineer = new ChiefEngineer();
        $this->builder = new Builder($this->schemeFactory);
    }

    abstract public function execute(string $command = '');

    public function getAvailableCommands(): array
    {
        return self::COMMAND_DESCRIBE;
    }

    public function getMessage()
    {
        return $this->message;
    }
}