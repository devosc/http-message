<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Cookie\HttpCookies;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

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
        return function() {
            return new HttpCookies($_COOKIE);
        };
    }
}
