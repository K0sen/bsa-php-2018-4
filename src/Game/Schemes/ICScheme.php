<?php

namespace BinaryStudioAcademy\Game\Schemes;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Abstractions\AbstractScheme;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class ICScheme extends AbstractScheme
{
    /**
     * @return array
     * @throws GameExceptions
     */
    public function getNecessaryComponents(): array
    {
        return [
            $this->componentFactory->getComponent(AbstractComponent::METAL),
            $this->componentFactory->getComponent(AbstractComponent::SILICON)
        ];
    }
}