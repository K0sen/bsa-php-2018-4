<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;

class LauncherScheme extends AbstractScheme
{
    /**
     * @return array
     * @throws \BinaryStudioAcademy\Game\Exceptions\GameExceptions
     */
    public function getNecessaryComponents(): array
    {
        return [
            $this->componentFactory->getComponent(AbstractComponent::WATER),
            $this->componentFactory->getComponent(AbstractComponent::FIRE),
            $this->componentFactory->getComponent(AbstractComponent::FUEL)
        ];
    }
}