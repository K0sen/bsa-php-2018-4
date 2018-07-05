<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Schemes\{
    ControlUnitScheme, EngineScheme, ICScheme, LauncherScheme, PortholeScheme, ShellScheme, TankScheme, WiresScheme
};

class SchemeFactory
{
    /**
     * @param string $module
     * @return array
     * @throws GameExceptions
     * @throws \Exception
     */
    public function getModuleScheme(string $module): array
    {
        switch ($module) {
            case Storage::IC:
                return ICScheme::getNecessaryComponents();
            case Storage::WIRES:
                return WiresScheme::getNecessaryComponents();
            case Storage::SHELL:
                return ShellScheme::getNecessaryComponents();
            case Storage::PORTHOLE:
                return PortholeScheme::getNecessaryComponents();
            case Storage::CONTROL_UNIT:
                return ControlUnitScheme::getNecessaryComponents();
            case Storage::ENGINE:
                return EngineScheme::getNecessaryComponents();
            case Storage::LAUNCHER:
                return LauncherScheme::getNecessaryComponents();
            case Storage::TANK:
                return TankScheme::getNecessaryComponents();
            default:
                throw new GameExceptions(GameExceptions::NO_SCHEME, $module);
        }
    }
}