<?php

namespace BinaryStudioAcademy\Game\Contracts;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;

interface BuilderInterface
{
    public function getScheme();

    public function assembleComponent(array $scheme);

    public function getComponent(): AbstractComponent;
}