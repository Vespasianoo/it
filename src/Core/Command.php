<?php

namespace It\Core;

abstract class Command
{
    abstract public function handle(ArgvInput $argvInput): void;
}
