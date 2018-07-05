<?php

namespace BinaryStudioAcademy\Game;


use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Contracts\BuilderInterface;

class ChiefEngineer
{
    public function assemble(BuilderInterface $builder): AbstractComponent
    {
        $scheme = $builder->getScheme();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}