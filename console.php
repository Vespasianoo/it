<?php

use It\Commands\Help;
use It\Commands\Init;
use It\Commands\MakeController;
use It\Commands\MakeModel;
use It\Commands\MakeServiceModel;
use It\Core\CommandManager;

CommandManager::addCommand('help', Help::class);
CommandManager::addCommand('make:model', MakeModel::class);
CommandManager::addCommand('make:controller', MakeController::class);
CommandManager::addCommand('make:sm', MakeServiceModel::class);
CommandManager::addCommand('init', Init::class);
