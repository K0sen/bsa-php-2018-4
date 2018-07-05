<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class TankScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::METAL, Storage::FUEL];
    }
}