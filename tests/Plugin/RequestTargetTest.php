<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Http\Uri;
use Valar\Plugin\RequestTarget;
use Valar\ServerRequest;

class RequestTargetTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'target' => new RequestTarget,
            'uri' => new Uri(['path' => '/foo'])
        ];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals('/foo', $request->getRequestTarget());
    }
}
