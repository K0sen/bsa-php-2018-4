<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class WiresScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::COPPER, Storage::FIRE];
    }
}