<?php

namespace BinaryStudioAcademy\Game\Abstractions;

abstract class AbstractComponent
{
    /**
     * @var string
     */
    public $name;

    /**
     * AbstractComponent constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->name;
    }
}