<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\ServerRequestFactory;

class Files
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'files')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            return ServerRequestFactory::normalizeFiles($_FILES);
        };
    }
}