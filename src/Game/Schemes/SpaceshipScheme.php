<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class SpaceshipScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::MODULE, 'item' => Storage::SHELL],
            ['type' => Storage::MODULE, 'item' => Storage::PORTHOLE],
            ['type' => Storage::MODULE, 'item' => Storage::CONTROL_UNIT],
            ['type' => Storage::MODULE, 'item' => Storage::ENGINE],
            ['type' => Storage::MODULE, 'item' => Storage::LAUNCHER],
            ['type' => Storage::MODULE, 'item' => Storage::TANK]
        ];
    }
}