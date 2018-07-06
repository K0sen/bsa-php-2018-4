<?php

namespace BinaryStudioAcademy\Game\Contracts;

use BinaryStudioAcademy\Game\Storage;

interface SchemeInterface
{
    public function getNecessaryComponents(): array;
    public function getMissingComponents(Storage $storage): array;
}