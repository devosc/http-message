<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Version
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'version')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            return substr($this[Arg::SERVER]['SERVER_PROTOCOL'] ?? 'HTTP/1.1', strlen('HTTP/'));
        };
    }
}
