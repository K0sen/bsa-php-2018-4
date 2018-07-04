<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Exceptions\GameExceptions;

class Game
{
    /**
     * @var Storage
     */
    public $storage;

    /**
     * Game constructor.
     * @param Storage $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param Reader $reader
     * @param Writer $writer
     */
    public function start(Reader $reader, Writer $writer): void
    {
        $writer->writeln("Hi, engineer! Let's build spaceship");

        while (true) {
            $this->run($reader, $writer);
        }
    }

    /**
     * @param Reader $reader
     * @param Writer $writer
     */
    public function run(Reader $reader, Writer $writer): void
    {
        $writer->write("Input :> ");
        $input = trim(strtolower($reader->read()));
        try {
            $slice = explode(':', $input);
            $commandName = $slice[0];
            $commandInstruction = $slice[1] ?? '';

            $commandFactory = new CommandFactory();
            $command = $commandFactory->createCommand($commandName);
            $command->execute($commandInstruction);
        } catch (GameExceptions $e) {
            $writer->writeln($e->getMessage());
        } catch (\Exception $e) {
            $writer->writeln($e->getMessage());
        }
    }
}
