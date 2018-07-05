<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

abstract class AbstractStorage
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

    public const MODULE    = 'module';
    public const RESOURCE  = 'resource';

    protected $modules    = [];
    protected $resources  = [];

    /**
     * @param string $type
     * @param string $item
     */
    abstract public function put(string $type, string $item);

    /**
     * @param string $type
     * @param string $item
     */
    abstract public function get(string $type, string $item);

    /**
     * @param string $type
     * @param string $item
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function checkAvailability(string $type, string $item): bool
    {
        switch ($type) {
            case self::MODULE:
                return \in_array($item, $this->modules, true);
            case self::RESOURCE:
                return \in_array($item, $this->resources, true);
            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM, $item);
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
