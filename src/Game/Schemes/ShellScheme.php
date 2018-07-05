<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class ShellScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [
            ['type' => Storage::RESOURCE, 'item' => Storage::METAL],
            ['type' => Storage::RESOURCE, 'item' => Storage::FIRE]
        ];
    }
}
