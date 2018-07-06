<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class EngineScheme extends AbstractScheme
{
    /**
     * @return array
     * @throws GameExceptions
     */
    public function getNecessaryComponents(): array
    {
        return [
            $this->componentFactory->getComponent(AbstractComponent::METAL),
            $this->componentFactory->getComponent(AbstractComponent::CARBON),
            $this->componentFactory->getComponent(AbstractComponent::FIRE)
        ];
    }
}