<?php

namespace Dnunez24\Platformsh\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Dnunez24\Platformsh\Strategy\BuildStrategyInterface;

abstract class AbstractBuildCommand extends Command
{
    public function __construct(BuildStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
        parent::__construct('build');
    }

    abstract protected function configure();

    private function execute(InputInterface $input, OutputInterface $output)
    {
        $this->strategy->build($input, $output);
    }
}
