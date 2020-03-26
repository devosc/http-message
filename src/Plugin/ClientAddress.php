<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use const Mvc5\SERVER;

final class ClientAddress
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'client_address')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param array $server
     * @return string
     */
    static function ipAddress(array $server) : string
    {
        return $server['HTTP_CLIENT_IP'] ?? $server['HTTP_X_FORWARDED_FOR'] ?? $server['REMOTE_ADDR'] ?? '';
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => ClientAddress::ipAddress($this[SERVER]);
    }
}
