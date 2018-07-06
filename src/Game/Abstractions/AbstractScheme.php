<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Contracts\SchemeInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Factories\ComponentFactory;
use BinaryStudioAcademy\Game\Storage;

abstract class AbstractScheme implements SchemeInterface
{
    protected $componentFactory;

    public function __construct()
    {
        $this->componentFactory = new ComponentFactory();
    }

    abstract public function getNecessaryComponents(): array;

    /**
     * @param Storage $storage
     * @return array
     * @throws \Exception
     */
    public function getMissingComponents(Storage $storage): array
    {
        $missingComponents = [];
        foreach ($this->getNecessaryComponents() as $necessaryComponent) {
            switch ($necessaryComponent->type) {
                case AbstractComponent::MODULE:
                    if (!\in_array($necessaryComponent->name, $storage->getModules(), true)) {
                        $missingComponents[] = $necessaryComponent->name;
                    }

                    break;
                case AbstractComponent::RESOURCE:
                    if (!array_key_exists($necessaryComponent->name, $storage->getResources())) {
                        $missingComponents[] = $necessaryComponent->name;
                    }

                    break;
                default:
                    throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $necessaryComponent->type);
            }
        }

        return $missingComponents;
    }
}