<?php

namespace BinaryStudioAcademy\Game\Abstractions;

use BinaryStudioAcademy\Game\Contracts\SchemeInterface;

abstract class AbstractScheme implements SchemeInterface
{
    abstract public static function getNecessaryComponents(): array;

    public static function checkComponentAvailability(array $components)
    {
        $missingComponents = [];
        foreach (static::getNecessaryComponents() as $necessaryComponent) {
            if (!\in_array($necessaryComponent['item'], $components, true)) {
                $missingComponents[] = $necessaryComponent['item'];
            }
        }

        return $missingComponents;
    }
}