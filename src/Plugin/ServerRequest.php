<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\App;
use Mvc5\Arg;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Scope;
use Valar\ServerRequest as Request;

class ServerRequest
    extends Scope
{
    /**
     * @param array|mixed $plugins
     */
    function __construct($plugins = [])
    {
        parent::__construct(
            Request::class, [new Plugin(App::class, [[Arg::SERVICES => $plugins], null, true, true]), new Link]
        );
    }

    /**
     * @param array $options
     * @return ServerRequest
     */
    static function with(array $options = []) : self
    {
        return new static($options + include __DIR__ . '/../../config/request.php');
    }
}
