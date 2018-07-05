<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Contracts\CommandInterface;
use BinaryStudioAcademy\Game\Io\CliWriter;

abstract class AbstractCommand implements CommandInterface
{
    protected $writer;
    protected $commandDescribe = [
        self::HELP => "'show' - shows available commands",
        self::STATUS => "'status' - shows info about amount of available resources and what needed modules",
        self::BUILD => "'build:<spaceship_module>' - builds ship module",
        self::SCHEME => "'scheme:<spaceship_module>' - shows scheme of module - list of needed components",
        self::MINE => "'mine:<resource_name>' - adds resource unit to storage",
        self::PRODUCE => "'produce:<combined_resource>' - produces combine resources",
        self::EXIT => "'exit' - stops the game"
    ];

    public function __construct()
    {
        $this->writer = new CliWriter();
    }

    abstract public function execute(string $command = '');

    public function getAvailableCommands() {
        return $this->commandDescribe;
    }
}