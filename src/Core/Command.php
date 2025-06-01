<?php

namespace It\Core;

abstract class Command implements CommandInterface
{
    abstract public function handle(ArgvInput $argvInput): void;
}
