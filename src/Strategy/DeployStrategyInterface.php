<?php

namespace Dnunez24\Platformsh\Strategy;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface DeployStrategyInterface
{
    public function deploy(InputInterface $input, OutputInterface $output);
}
