<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\PhpInputStream;

class ServerRequest
    extends Request
    implements ServerRequestInterface
{
    /**
     *
     */
    use Config\ServerRequest;

    /**
     * @param array $config
     */
    function __construct($config = [])
    {
        !isset($config[Arg::BODY]) &&
            $config[Arg::BODY] = new PhpInputStream;

        parent::__construct($config);
    }
}
