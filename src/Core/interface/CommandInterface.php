<?php

namespace It\Core;

use It\Core\ArgvInput;

interface CommandInterface
{
    public function handle(ArgvInput $argvInput): void;
}