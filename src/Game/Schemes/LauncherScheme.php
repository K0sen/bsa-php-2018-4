<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class LauncherScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::WATER, Storage::FIRE, Storage::FUEL];
    }
}