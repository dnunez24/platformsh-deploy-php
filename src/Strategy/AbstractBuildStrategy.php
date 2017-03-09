<?php

namespace Dnunez24\Platformsh\Strategy;

use Dnunez24\Platformsh\Environment;

abstract class AbstractBuildStrategy implements BuildStrategyInterface
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
