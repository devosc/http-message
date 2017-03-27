<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class ClientAddress
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'client_address')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param $server
     * @return string
     */
    protected function clientIpAddress($server)
    {
        return $server['HTTP_CLIENT_IP'] ?? $server['HTTP_X_FORWARDED_FOR'] ?? $server['REMOTE_ADDR'] ?? '';
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            return $this->clientIpAddress($this[Arg::SERVER]);
        };
    }
}
