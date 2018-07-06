<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Storage;

class BuildCommand extends AbstractCommand
{
    private $type;

    /**
     * BuildCommand constructor.
     * @param Storage $storage
     * @param string $type
     */
    public function __construct(Storage $storage, string $type)
    {
        parent::__construct($storage);
        $this->type = $type;
    }

    /**
     * @param string $command
     * @throws \Exception
     */
    public function execute(string $command = ''): void
    {
        if (!\in_array($command, AbstractComponent::ALLOWED_MODULES, true) &&
            !\in_array($command, AbstractComponent::COMPOSITE_RESOURCES, true)
        ) {
            throw new GameExceptions(GameExceptions::UNKNOWN_MODULE);
        }

        $abstractComponent = $this->componentFactory->getComponent($command);
        if ($abstractComponent->type === AbstractComponent::MODULE &&
            $this->storage->checkAvailability($abstractComponent)
        ) {
            throw new GameExceptions(GameExceptions::MODULE_EXISTS, $abstractComponent->name);
        }

        $createdComponent = $this->chiefEngineer->assemble($this->builder, $abstractComponent, $this->storage);

        $this->storage->put($createdComponent);
        $componentName = ucfirst($createdComponent->name);
        switch ($createdComponent->type) {
            case AbstractComponent::MODULE:
                $this->message = "{$componentName} is ready!";
                break;
            case AbstractComponent::RESOURCE:
                $this->message = "{$componentName} added to inventory.";
                break;
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $createdComponent->type);
        }

        if ($this->checkShipIsReady()) {
            $this->message .= ' => You won!';
        }
    }

    /**
     * @throws GameExceptions
     */
    private function checkShipIsReady()
    {
        $scheme = $this->schemeFactory->getModuleScheme(AbstractComponent::SPACESHIP);
        return empty($scheme->getMissingComponents($this->storage));
    }
}