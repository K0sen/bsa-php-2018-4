<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class ProduceCommand extends AbstractCommand
{
    /**
     * @param string $command
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        if (!\in_array($command, AbstractComponent::COMPOSITE_RESOURCES, true)) {
            throw new GameExceptions(GameExceptions::UNKNOWN_RESOURCE);
        }

        $abstractResource = $this->componentFactory->getComponent($command);
        $createdResource = $this->chiefEngineer->assemble($this->builder, $abstractResource, $this->storage);

        $this->storage->put($createdResource);
        $resourceName = ucfirst($createdResource->name);
        $this->message = "{$resourceName} added to inventory.";
    }
}