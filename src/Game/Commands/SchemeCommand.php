<?php

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Storage;

class SchemeCommand extends AbstractCommand
{
    /**
     * SchemeCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct($storage);
    }

    /**
     * @param string $command
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        if (!\in_array($command, AbstractComponent::ALLOWED_MODULES, true)) {
            throw new GameExceptions(GameExceptions::UNKNOWN_MODULE);
        }

        $scheme = $this->schemeFactory->getModuleScheme($command);
        $necessaryComponents = $scheme->getNecessaryComponents();
        $this->writeScheme($command, $necessaryComponents);
    }

    /**
     * @param string $module
     * @param array $components
     */
    private function writeScheme(string $module, array $components)
    {
        $componentsString = implode('|', array_map(function($component) {
            return $component->name;
        }, $components));
        $moduleName = ucfirst($module);
        $this->message = "{$moduleName} => $componentsString";
    }
}