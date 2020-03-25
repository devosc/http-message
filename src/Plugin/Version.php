<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use function strlen;
use function substr;

use const Mvc5\SERVER;

class Version
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'version')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => substr($this[SERVER]['SERVER_PROTOCOL'] ?? 'HTTP/1.1', strlen('HTTP/'));
    }
}
