<?php

namespace Dnunez24\Platformsh\Strategy;

use Dnunez24\Platformsh\Environment;

abstract class AbstractDeployStrategy implements DeployStrategyInterface
{
    public function __construct(Environment $env = null)
    {
        if (!isset($env)) {
            $env = new Environment();
        }

        $this->env = $env;
    }

    abstract public function build();
}
