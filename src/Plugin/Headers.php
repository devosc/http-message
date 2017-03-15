<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Http\Headers\Config;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Headers
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'headers')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            $headers = new Config;

            /** @var \Valar\Request\ServerRequest $this */
            foreach($this->http->headers->all() as $key => $val) {
                $headers[implode('-', array_map('ucfirst', explode('-', $key)))] = implode(', ', $val);
            }

            return $headers;
        };
    }
}
