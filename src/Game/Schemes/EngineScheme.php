<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class EngineScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::METAL, Storage::CARBON, Storage::FIRE];
    }
}