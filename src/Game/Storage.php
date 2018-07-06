<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractStorage;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class Storage extends AbstractStorage
{
    /**
     * @param AbstractComponent $component
     *
     * @throws \Exception
     */
    public function put(AbstractComponent $component): void
    {
        $componentName = $component->name;
        switch ($component->type) {
            case AbstractComponent::MODULE:
                if (!\in_array($componentName, AbstractComponent::ALLOWED_MODULES, true)) {
                    throw new GameExceptions(GameExceptions::UNKNOWN_ITEM, $componentName);
                }

                $this->modules[] = $componentName;
                break;

            case AbstractComponent::RESOURCE:
                if (!\in_array($componentName, AbstractComponent::ALLOWED_RESOURCES, true)) {
                    throw new GameExceptions(GameExceptions::UNKNOWN_RESOURCE, $componentName);
                }

                if (isset($this->resources[$componentName])) {
                    $this->resources[$componentName]++;
                } else {
                    $this->resources[$componentName] = 1;
                }

                break;

            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $component->type);
        }
    }

    /**
     * @param AbstractComponent $component
     *
     * @return null|AbstractComponent
     *
     * @throws \Exception
     */
    public function get(AbstractComponent $component): ?AbstractComponent
    {
        $componentName = $component->name;
        switch ($component->type) {
            case AbstractComponent::MODULE:
                if (!\in_array($componentName, $this->modules, true)) {
                    return null;
                }

                $key = array_search($componentName, $this->modules, true);
                unset($this->modules[$key]);

                return $component;

            case AbstractComponent::RESOURCE:
                if (!array_key_exists($componentName, $this->resources)) {
                    return null;
                }

                $this->resources[$componentName]--;
                if ($this->resources[$componentName] < 1) {
                    unset($this->resources[$componentName]);
                    return null;
                }

                return $component;

            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $component->type);
        }
    }
}
