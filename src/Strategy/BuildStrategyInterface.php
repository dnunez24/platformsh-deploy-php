<?php

namespace Dnunez24\Platformsh\Strategy;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface BuildStrategyInterface
{
    public function build(InputInterface $input, OutputInterface $output);
}
