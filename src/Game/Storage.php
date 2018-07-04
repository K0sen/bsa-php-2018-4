<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Abstractions\AbstractStorage;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class Storage extends AbstractStorage
{
    private const ALLOWED_COMPONENTS = [
        'metal',
        'ic',
        'wires',
        'shell',
        'porthole',
        'control_unit',
        'engine',
        'launcher',
        'tank'
    ];

    /**
     * @var array
     */
    private $components = [];

    /**
     * @param string $component
     * @return void
     */
    public function put(string $component): void
    {
        if (!in_array($component, self::ALLOWED_COMPONENTS)) {
            throw new \InvalidArgumentException('Invalid component given');
        }

        $this->components[] = $component;
    }

    /**
     * @param string $component
     * @return string
     */
    public function get(string $component): string
    {
        if (!in_array($component, $this->components)) {
            throw new \InvalidArgumentException('Invalid component given or it does not exist');
        }

        $key = array_search($component, $this->components);
        unset($this->components[$key]);

        return $component;
    }
}