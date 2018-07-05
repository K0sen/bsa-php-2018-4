<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Storage;

class ICScheme extends AbstractScheme
{
    public static function getNecessaryComponents(): array
    {
        return [Storage::METAL, Storage::SILICON];
    }
}