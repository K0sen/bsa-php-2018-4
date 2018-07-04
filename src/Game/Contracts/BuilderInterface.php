<?php

namespace BinaryStudioAcademy\Game\Contracts;

interface BuilderInterface
{
    public function getPlan();

    public function assemble();

    public function getVehicle(): Component;
}