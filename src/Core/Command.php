<?php

namespace It\Core;

use It\Core\CommandInterface;

abstract class Command implements CommandInterface
{
    abstract public function handle(ArgvInput $argvInput): void;
}
