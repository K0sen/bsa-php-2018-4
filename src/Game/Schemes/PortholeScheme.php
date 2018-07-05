<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class PortholeScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::RESOURCE, 'item' => Storage::SAND],
            ['type' => Storage::RESOURCE, 'item' => Storage::FIRE]
        ];
    }
}