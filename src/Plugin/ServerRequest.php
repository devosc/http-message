<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\App;
use Mvc5\ArrayObject;
use Mvc5\Arg;
use Mvc5\Plugin\Scope;
use Valar\ServerRequest as Request;

class ServerRequest
    extends Scope
{
    /**
     * @param array $plugins
     * @param string $class
     * @throws \Throwable
     */
    function __construct($plugins = [], string $class = Request::class)
    {
        parent::__construct($plugins, $class);
    }

    /**
     * @param array $options
     * @return ServerRequest
     * @throws \Throwable
     */
    static function with(array $options = []) : self
    {
        return new static($options + include __DIR__ . '/../../config/request.php');
    }
}
