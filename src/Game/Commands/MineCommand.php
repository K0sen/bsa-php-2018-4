<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Factories\ComponentFactory;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Storage;

class MineCommand extends AbstractCommand
{
    private const MINE_RESOURCES = [
        AbstractComponent::FIRE,
        AbstractComponent::SAND,
        AbstractComponent::IRON,
        AbstractComponent::SILICON,
        AbstractComponent::COPPER,
        AbstractComponent::CARBON,
        AbstractComponent::WATER,
        AbstractComponent::FUEL,
    ];

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
        if (!\in_array($command, self::MINE_RESOURCES, true)) {
            new GameExceptions(GameExceptions::UNKNOWN_RESOURCE);
        }

        $component = $this->componentFactory->getComponent($command);
        $this->storage->put($component);
        $resourceName = ucfirst($component->name);
        $this->message = "{$resourceName} added to inventory.";
    }
}