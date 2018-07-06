<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class ExitCommand extends AbstractCommand
{
    /**
     * ExitCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct($storage);
    }

    /**
     * @param string $string
     */
    public function execute(string $string = ''): void
    {
        $this->message = 'The pieces of your ship flew the space
and eventually got on the inhabited planet and destroyed the race living there';
        exit;
    }
}