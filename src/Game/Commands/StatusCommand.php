<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Abstractions\AbstractCommand;
use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Storage;

class StatusCommand extends AbstractCommand
{
    /**
     * StatusCommand constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        parent::__construct($storage);
    }

    /**
     * @param string $command
     * @throws \BinaryStudioAcademy\Game\Exceptions\GameExceptions
     */
    public function execute(string $command = ''): void
    {
        $resources = $this->storage->getResources();
        $modules = $this->storage->getModules();
        $scheme = $this->schemeFactory->getModuleScheme(AbstractComponent::SPACESHIP);
        $missingModules = $scheme->getMissingComponents($this->storage);

        $this->writeList('You have: ', $resources);
        $this->writeList('Parts ready: ', $modules);
        $this->writeList('Parts to build: ', $missingModules, 'Your ship is ready!');
    }

    /**
     * @param $themeMessage
     * @param $elements
     * @param string $nothingMessage
     */
    protected function writeList($themeMessage, $elements, $nothingMessage = ' - Nothing...')
    {
        $this->message .= $themeMessage . PHP_EOL;
        if (empty($elements)) {
            $this->message .= $nothingMessage . PHP_EOL;
        } else {
            foreach ($elements as $key => $element) {
                if (is_numeric($key)) {
                    $this->message .= ' - '. $element . PHP_EOL;
                } else if (is_string($key)) {
                    $this->message .= " - {$key} - {$element};" . PHP_EOL;
                }

            }
        }
    }
}