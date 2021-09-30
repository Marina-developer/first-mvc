<?php

namespace app\core\Middlewares;

use app\Core\Middlewares\AuthMiddleware;

abstract class BaseMiddleware
{
    abstract public function execute();
}