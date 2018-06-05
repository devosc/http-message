<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Valar\Plugin\Body;
use Valar\ServerRequest;

class BodyTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['body' => new Body];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertInstanceOf(StreamInterface::class, $request->getBody());
    }
}
