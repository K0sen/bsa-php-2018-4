<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Schemes\SpaceshipScheme;
use BinaryStudioAcademy\Game\Storage;

class StatusCommand extends AbstractCommand
{
    private $storage;

    /**
     * SchemeCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct();

        $this->storage = $storage;
    }

    /**
     * @param string $command
     */
    public function execute(string $command = ''): void
    {
        $resources = $this->storage->getResources();
        $modules = $this->storage->getModules();
        $missingModules = SpaceshipScheme::checkComponentAvailability($modules);

        $this->writeList('You have: ', $resources);
        $this->writeList('Parts ready: ', $modules);
        $this->writeList('Parts to build: ', $missingModules, 'Your ship is ready!');
    }

    protected function writeList($themeMessage, $elements, $nothingMessage = ' - Nothing...')
    {
        $this->writer->writeln($themeMessage);
        if (empty($elements)) {
            $this->writer->writeln($nothingMessage);
        } else {
            foreach ($elements as $key => $element) {
                if (is_numeric($key)) {
                    $this->writer->writeln(' - '. $element);
                } else if (is_string($key)) {
                    $this->writer->writeln(" - {$key} - {$element};");
                }

            }
        }
    }
}