<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;


class SpaceshipScheme extends AbstractScheme
{
    /**
     * @return array
     * @throws \BinaryStudioAcademy\Game\Exceptions\GameExceptions
     */
    public function getNecessaryComponents(): array
    {
        return [
            $this->componentFactory->getComponent(AbstractComponent::SHELL),
            $this->componentFactory->getComponent(AbstractComponent::PORTHOLE),
            $this->componentFactory->getComponent(AbstractComponent::CONTROL_UNIT),
            $this->componentFactory->getComponent(AbstractComponent::ENGINE),
            $this->componentFactory->getComponent(AbstractComponent::LAUNCHER),
            $this->componentFactory->getComponent(AbstractComponent::TANK)
        ];
    }
}