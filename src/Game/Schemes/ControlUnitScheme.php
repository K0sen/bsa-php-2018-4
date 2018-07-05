<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class ControlUnitScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::MODULE, 'item' => Storage::IC],
            ['type' => Storage::MODULE, 'item' => Storage::WIRES]
        ];
    }
}