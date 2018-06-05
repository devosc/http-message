<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Symfony\Component\HttpFoundation\AcceptHeader;

class AcceptsJson
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'accepts_json')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param string|null $accept
     * @return string|null
     */
    static function header(?string $accept) : ?string
    {
        return null !== $accept ? (array_keys(AcceptHeader::fromString($accept)->all())[0] ?? null) : null;
    }

    /**
     * @param null|string $accept
     * @return bool
     */
    static function match(?string $accept) : bool
    {
        return $accept && (false !== strpos($accept, '/json') || false !== strpos($accept, '+json'));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return function() {
            return AcceptsJson::match(AcceptsJson::header($this[Arg::HEADERS]['accept']));
        };
    }
}
