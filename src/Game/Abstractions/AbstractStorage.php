<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Factories\ComponentFactory;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

abstract class AbstractStorage
{
    protected $componentFactory;
    protected $modules    = [];
    protected $resources  = [];

    public function __construct()
    {
        $this->componentFactory = new ComponentFactory();
    }

    /**
     * @param AbstractComponent $item
     * @return mixed
     */
    abstract public function put(AbstractComponent $item);

    /**
     * @param AbstractComponent $item
     * @return AbstractComponent|null
     */
    abstract public function get(AbstractComponent $item): ?AbstractComponent;

    /**
     * @param AbstractComponent $component
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function checkAvailability(AbstractComponent $component): bool
    {
        switch ($component->type) {
            case AbstractComponent::MODULE:
                return \in_array($component->name, $this->modules, true);
            case AbstractComponent::RESOURCE:
                return isset($this->resources[$component->name]);
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM, $component->name);
        }
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function getModules()
    {
        return $this->modules;
    }
}
