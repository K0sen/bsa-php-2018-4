<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Abstractions\AbstractComponent;
use BinaryStudioAcademy\Game\Contracts\SchemeInterface;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;
use BinaryStudioAcademy\Game\Factories\SchemeFactory;

class Builder
{
    /**
     * @var SchemeFactory
     */
    private $schemeFactory;
    /**
     * @var AbstractComponent
     */
    private $component;
    /**
     * @var Storage
     */
    private $storage;
    /**
     * @var SchemeInterface
     */
    private $scheme;

    /**
     * AbstractBuilder constructor.
     * @param SchemeFactory $schemeFactory
     */
    public function __construct(SchemeFactory $schemeFactory)
    {
        $this->schemeFactory = $schemeFactory;
    }

    /**
     * @param AbstractComponent $component
     */
    public function createComponent(AbstractComponent $component, Storage $storage): void
    {
        $this->component = $component;
        $this->storage = $storage;
    }

    /**
     * @throws \BinaryStudioAcademy\Game\Exceptions\GameExceptions
     */
    public function setScheme()
    {
        $this->scheme = $this->schemeFactory->getModuleScheme($this->component->name);
    }

    /**
     * @throws \Exception
     */
    public function checkComponents()
    {
        $missingComponents = $this->scheme->getMissingComponents($this->storage);
        if (!empty($missingComponents)) {
            if (!empty($missingComponents)) {
                switch ($this->component->type) {
                    case AbstractComponent::MODULE:
                        $this->showMissingComponents($missingComponents);
                        break;
                    case AbstractComponent::RESOURCE:
                        $this->showMissingComponents($missingComponents, GameExceptions::NEED_TO_MINE);
                        break;
                    default:
                        throw new GameExceptions(GameExceptions::UNKNOWN_ITEM_TYPE, $this->component->type);
                }
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function getComponents()
    {
        $components = $this->scheme->getNecessaryComponents();

        foreach ($components as $component) {
            $this->storage->get($component);
        }
    }

    /**
     * @return AbstractComponent
     */
    public function getItem(): AbstractComponent
    {
        return $this->component;
    }

    /**
     * @param array $components
     * @param int $exception
     * @throws \Exception
     */
    private function showMissingComponents(array $components, $exception = GameExceptions::INV_SHOULD_HAVE)
    {
        $componentsString = implode(',', $components);

        throw new GameExceptions($exception, $componentsString);
    }
}