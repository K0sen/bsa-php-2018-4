<?php

namespace BinaryStudioAcademy\Game\Contracts;

interface CommandInterface
{
    public const HELP    = 'help';
    public const STATUS  = 'status';
    public const BUILD   = 'build';
    public const SCHEME  = 'scheme';
    public const MINE    = 'mine';
    public const PRODUCE = 'produce';
    public const EXIT    = 'exit';

    public function execute(string $command = '');
    public function getMessage();
}