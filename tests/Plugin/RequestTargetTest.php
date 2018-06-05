<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Http\Uri;
use Valar\Plugin\RequestTarget;
use Valar\ServerRequest;

class RequestTargetTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = [
            'target' => new RequestTarget,
            'uri' => new Uri(['path' => '/foo'])
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('/foo', $request->getRequestTarget());
    }
}
