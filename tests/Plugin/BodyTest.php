<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertInstanceOf(StreamInterface::class, $request->getBody());
    }
}
