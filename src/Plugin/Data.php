<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Exception;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Data
    extends Shared
{
    /**
     * @var bool
     */
    protected $assoc = true;

    /**
     * @param $name
     */
    function __construct($name = 'data')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param string $body
     * @return mixed
     */
    static function decode(string $body) : array
    {
        return static::result(json_decode($body, true));
    }

    /**
     * @param null|string $type
     * @return bool
     */
    static function isJson(?string $type) : bool
    {
        return $type && (false !== strpos($type, '/json') || false !== strpos($type, '+json'));
    }

    /**
     * @param $result
     * @return array
     */
    static function result($result) : array
    {
        return JSON_ERROR_NONE === json_last_error() ? $result :
            Exception::invalidArgument('JSON Decode Error: ' . json_last_error_msg());
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return function() {
            return Data::isJson($this[Arg::HEADERS]['content-type']) ?
                Data::decode((string) $this[Arg::BODY]) : new GlobalVar('_POST');
        };
    }
}
