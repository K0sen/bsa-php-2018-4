<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class LauncherScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::RESOURCE, 'item' => Storage::WATER],
            ['type' => Storage::RESOURCE, 'item' => Storage::FIRE],
            ['type' => Storage::RESOURCE, 'item' => Storage::FUEL]
        ];
    }
}