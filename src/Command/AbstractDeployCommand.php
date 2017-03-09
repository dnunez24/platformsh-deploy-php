<?php

namespace Dnunez24\Platformsh\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Dnunez24\Platformsh\Strategy\DeployStrategyInterface;

abstract class AbstractDeployCommand extends Command
{
    public function __construct(DeployStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
        parent::__construct('deploy');
    }
    
    abstract protected function configure();

    private function execute(InputInterface $input, OutputInterface $output)
    {
        $this->strategy->deploy($input, $output);
    }
}
