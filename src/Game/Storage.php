<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Abstractions\AbstractStorage;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class Storage extends AbstractStorage
{
    private const ALLOWED_COMPONENTS = [
        self::IC,
        self::WIRES,
        self::SHELL,
        self::PORTHOLE,
        self::CONTROL_UNIT,
        self::ENGINE,
        self::LAUNCHER,
        self::TANK,
    ];

    private const ALLOWED_RESOURCES = [
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

    /**
     * @param string $item
     * @param string $type
     *
     * @throws \Exception
     */
    public function put(string $type, string $item): void
    {
        switch ($type) {
            case self::COMPONENT:
                if (!\in_array($item, self::ALLOWED_COMPONENTS, true)) {
                    throw new GameExceptions(GameExceptions::UNKNOWN_ITEM, $item);
                }

                if (\in_array($item, $this->components, true)) {
                    throw new GameExceptions(GameExceptions::COMPONENT_EXISTS, $item);
                }

                $this->components[] = $item;
                break;

            case self::RESOURCE:
                if (!\in_array($item, self::ALLOWED_RESOURCES, true)) {
                    throw new GameExceptions(GameExceptions::UNKNOWN_RESOURCE, $item);
                }

                if (isset($this->resources[$item])) {
                    $this->resources[$item]++;
                } else {
                    $this->resources[$item] = 1;
                }

                break;

            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $type);
        }
    }

    /**
     * @param string $type
     * @param string $item
     *
     * @return null|string
     *
     * @throws \Exception
     */
    public function get(string $type, string $item): ?string
    {
        switch ($type) {
            case self::COMPONENT:
                if (!\in_array($item, $this->components, true)) {
                    return null;
                }

                $key = array_search($item, $this->components, true);
                unset($this->components[$key]);

                return $item;

            case self::RESOURCE:
                if (!array_key_exists($item, $this->resources) || $this->resources[$item] <= 0) {
                    return null;
                }

                $this->resources[$item]--;
                return $item;

            default:
                throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $type);
        }
    }
}
