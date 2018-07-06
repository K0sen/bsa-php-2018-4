<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class BuildCommand extends AbstractCommand
{
    /**
     * @param string $command
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        if (!\in_array($command, AbstractComponent::ALLOWED_MODULES, true)) {
            throw new GameExceptions(GameExceptions::UNKNOWN_MODULE);
        }

        $abstractModule = $this->componentFactory->getComponent($command);
        if ($this->storage->checkAvailability($abstractModule)) {
            throw new GameExceptions(GameExceptions::MODULE_EXISTS, $abstractModule->name);
        }

        $createdModule = $this->chiefEngineer->assemble($this->builder, $abstractModule, $this->storage);

        $this->storage->put($createdModule);
        $componentName = ucfirst($createdModule->name);
        $this->message = "{$componentName} is ready!";

        if ($this->checkShipIsReady()) {
            $this->message .= ' => You won!';
        }
    }

    /**
     * @throws \Exception
     * @throws GameExceptions
     */
    private function checkShipIsReady(): bool
    {
        $scheme = $this->schemeFactory->getModuleScheme(AbstractComponent::SPACESHIP);
        return empty($scheme->getMissingComponents($this->storage));
    }
}