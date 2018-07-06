<?php

namespace BinaryStudioAcademy\Game;


use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;

class ChiefEngineer
{
    /**
     * @param Builder $builder
     * @param AbstractComponent $component
     * @param Storage $storage
     * @return AbstractComponent
     * @throws \Exception
     */
    public function assemble(Builder $builder, AbstractComponent $component, Storage $storage): AbstractComponent
    {
        $builder->createComponent($component, $storage);
        $builder->setScheme();
        $builder->checkComponents();
        $builder->getComponents();

        return $builder->getItem();
    }
}