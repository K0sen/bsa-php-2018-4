<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;

class ShellScheme extends AbstractScheme
{
    /**
     * @return array
     * @throws \BinaryStudioAcademy\Game\Exceptions\GameExceptions
     */
    public function getNecessaryComponents(): array
    {
        return [
            $this->componentFactory->getComponent(AbstractComponent::METAL),
            $this->componentFactory->getComponent(AbstractComponent::FIRE)
        ];
    }
}
