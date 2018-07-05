<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Storage;

class ProduceCommand extends AbstractCommand
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
     * @param string $string
     * @throws \ReflectionException
     */
    public function execute(string $string = ''): void
    {
        $this->writer->writeln($string);
    }
}