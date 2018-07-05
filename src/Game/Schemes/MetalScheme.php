<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class MetalScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::IRON, Storage::FIRE];
    }
}