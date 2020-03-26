<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Exception;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use function json_decode;
use function json_last_error;
use function json_last_error_msg;
use function strpos;

use const Mvc5\{ BODY, HEADERS };

final class Data
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'data')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param string $body
     * @return mixed
     * @throws \Throwable
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
     * @throws \Throwable
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
        return fn() => Data::isJson($this[HEADERS]['content-type']) ?
                Data::decode((string) $this[BODY]) : new GlobalVar('_POST');
    }
}
