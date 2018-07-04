<?php

require __DIR__ . '/vendor/autoload.php';

$reader = new \BinaryStudioAcademy\Game\Io\CliReader();
$writer = new \BinaryStudioAcademy\Game\Io\CliWriter();
$storage = new \BinaryStudioAcademy\Game\Storage();

$game = new \BinaryStudioAcademy\Game\Game($storage);

$game->start($reader, $writer);
