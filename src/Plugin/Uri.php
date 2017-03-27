<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Valar\Http\Uri as HttpUri;
use Zend\Diactoros\ServerRequestFactory as Factory;

class Uri
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'uri')
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
            return new HttpUri((string) Factory::marshalUriFromServer($this[Arg::SERVER], \iterator_to_array($this[Arg::HEADERS])));
        };
    }
}
