<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Contracts\SchemeInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Schemes\{
    ControlUnitScheme,
    EngineScheme,
    ICScheme,
    LauncherScheme,
    MetalScheme,
    PortholeScheme,
    ShellScheme,
    SpaceshipScheme,
    TankScheme,
    WiresScheme
};
use BinaryStudioAcademy\Game\Storage;

class SchemeFactory
{
    /**
     * @param string $module
     * @return SchemeInterface
     * @throws GameExceptions
     * @throws \Exception
     */
    public function getModuleScheme(string $module): SchemeInterface
    {
        switch ($module) {
            case AbstractComponent::METAL:
                return new MetalScheme();
            case AbstractComponent::IC:
                return new ICScheme();
            case AbstractComponent::WIRES:
                return new WiresScheme();
            case AbstractComponent::SHELL:
                return new ShellScheme();
            case AbstractComponent::PORTHOLE:
                return new PortholeScheme();
            case AbstractComponent::CONTROL_UNIT:
                return new ControlUnitScheme();
            case AbstractComponent::ENGINE:
                return new EngineScheme();
            case AbstractComponent::LAUNCHER:
                return new LauncherScheme();
            case AbstractComponent::TANK:
                return new TankScheme();
            case AbstractComponent::SPACESHIP:
                return new SpaceshipScheme();
            default:
                throw new GameExceptions(GameExceptions::NO_SCHEME, $module);
        }
    }
}