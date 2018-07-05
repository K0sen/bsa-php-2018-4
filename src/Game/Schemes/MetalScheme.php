<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class MetalScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::RESOURCE, 'item' => Storage::IRON],
            ['type' => Storage::RESOURCE, 'item' => Storage::FIRE]
        ];
    }
}