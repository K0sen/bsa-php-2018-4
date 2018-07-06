<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Components\{
    Carbon,
    ControlUnit,
    Copper,
    Engine,
    Fire,
    Fuel,
    IC,
    Iron,
    Launcher,
    Metal,
    Porthole,
    Sand,
    Shell,
    Silicon,
    Spaceship,
    Tank,
    Water,
    Wires
};
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class ComponentFactory
{
    /**
     * @param string $name
     * @return AbstractComponent
     * @throws GameExceptions
     * @throws \Exception
     */
    public function getComponent(string $name): AbstractComponent
    {
        switch ($name) {
            case AbstractComponent::CARBON:
                return new Carbon();
            case AbstractComponent::CONTROL_UNIT:
                return new ControlUnit();
            case AbstractComponent::COPPER:
                return new Copper();
            case AbstractComponent::ENGINE:
                return new Engine();
            case AbstractComponent::FIRE:
                return new Fire();
            case AbstractComponent::FUEL:
                return new Fuel();
            case AbstractComponent::IC:
                return new IC();
            case AbstractComponent::IRON:
                return new Iron();
            case AbstractComponent::LAUNCHER:
                return new Launcher();
            case AbstractComponent::METAL:
                return new Metal();
            case AbstractComponent::PORTHOLE:
                return new Porthole();
            case AbstractComponent::SAND:
                return new Sand();
            case AbstractComponent::SHELL:
                return new Shell();
            case AbstractComponent::SILICON:
                return new Silicon();
            case AbstractComponent::SPACESHIP:
                return new Spaceship();
            case AbstractComponent::TANK:
                return new Tank();
            case AbstractComponent::WATER:
                return new Water();
            case AbstractComponent::WIRES:
                return new Wires();
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_COMPONENT, $name);
        }
    }
}