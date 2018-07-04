<?php

namespace BinaryStudioAcademy\Game\Abstractions;

abstract class AbstractStorage
{
    /**
     * @var array
     */
    private $components = [];

    /**
     * @param string $component
     */
    public function put(string $component)
    {
        $component[] = $component;
    }

    /**
     * @param string $component
     * @return null|string
     */
    public function get(string $component)
    {
        return in_array($component, $this->components) ? $component : null;
    }

    /**
     * @param string $component
     * @return bool
     */
    public function checkAvailability(string $component)
    {
        return in_array($component, $this->components);
    }
}