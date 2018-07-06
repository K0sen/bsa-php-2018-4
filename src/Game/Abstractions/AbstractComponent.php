<?php

namespace BinaryStudioAcademy\Game\Abstractions;

abstract class AbstractComponent
{
    // resources
    public const METAL   = 'metal';
    public const FIRE    = 'fire';
    public const SAND    = 'sand';
    public const IRON    = 'iron';
    public const SILICON = 'silicon';
    public const COPPER  = 'copper';
    public const CARBON  = 'carbon';
    public const WATER   = 'water';
    public const FUEL    = 'fuel';

    // modules
    public const IC           = 'ic';
    public const WIRES        = 'wires';
    public const SHELL        = 'shell';
    public const PORTHOLE     = 'porthole';
    public const CONTROL_UNIT = 'control_unit';
    public const ENGINE       = 'engine';
    public const LAUNCHER     = 'launcher';
    public const TANK         = 'tank';

    public const MODULE     = 'module';
    public const RESOURCE   = 'resource';
    public const SPACESHIP  = 'spaceship';

    public const ALLOWED_MODULES = [
        self::IC,
        self::WIRES,
        self::SHELL,
        self::PORTHOLE,
        self::CONTROL_UNIT,
        self::ENGINE,
        self::LAUNCHER,
        self::TANK,
    ];

    public const COMPOSITE_RESOURCES = [
        self::METAL,
    ];

    public const ALLOWED_RESOURCES = [
        self::METAL,
        self::FIRE,
        self::SAND,
        self::IRON,
        self::SILICON,
        self::COPPER,
        self::CARBON,
        self::WATER,
        self::FUEL,
    ];

    public $name;
    public $type;

    /**
     * @return string
     */
    public function __toString() {
        return $this->name;
    }
}