<?php

namespace BinaryStudioAcademy\Game\Contracts;

interface CommandInterface
{
    public const COMMANDS = [
        'help',
        'status',
        'build',
        'scheme',
        'mine',
        'produce',
    ];

    public function execute(string $command = '');
}