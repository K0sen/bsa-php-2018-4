<?php

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\SchemeFactory;
use BinaryStudioAcademy\Game\Storage;

class SchemeCommand extends AbstractCommand
{
    private $storage;
    private $schemes;

    /**
     * SchemeCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct();

        $this->storage = $storage;
        $this->schemes = new SchemeFactory();
    }

    /**
     * @param string $command
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        if (!\in_array($command, $this->storage->getAvailableModules(), true)) {
            throw new GameExceptions(GameExceptions::UNKNOWN_MODULE);
        }

        $necessaryComponents = $this->schemes->getModuleScheme($command);
        $this->writeScheme($command, $necessaryComponents);
    }

    private function writeScheme(string $module, array $components)
    {
        $componentsString = implode('|', array_map(function($component) {
            return $component['item'];
        }, $components));
        $moduleName = ucfirst($module);
        $this->writer->writeln("{$moduleName} => $componentsString");
    }
}