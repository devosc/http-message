<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Cookie\HttpCookies;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use function Laminas\Diactoros\parseCookieHeader;

class Cookies
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'cookies')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => new HttpCookies(
                isset($this[Arg::HEADERS]['cookie']) ? parseCookieHeader($this[Arg::HEADERS]['cookie']) : $_COOKIE
        );
    }
}
