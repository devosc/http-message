<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Http\Uri;
use Valar\Plugin\RequestTarget;
use Valar\Plugin\ServerRequest;

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

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('/foo', $request->getRequestTarget());
    }
}
