<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\App;
use Mvc5\Arg;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Plugin as _Plugin;
use Mvc5\Plugin\Scope;
use Valar\ServerRequest as _ServerRequest;

class ServerRequest
    extends Scope
{
    /**
     * @param array|mixed $plugins
     */
    function __construct($plugins)
    {
        parent::__construct(
            _ServerRequest::class, [new _Plugin(App::class, [[Arg::SERVICES => $plugins], null, true, true]), new Link]
        );
    }
}
