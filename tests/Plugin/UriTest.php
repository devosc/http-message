<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Http\HttpHeaders;
use Mvc5\Plugin\Scope;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Http\Uri as HttpUri;
use Valar\Plugin\Uri;
use Valar\ServerRequest;

class UriTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'headers' => new HttpHeaders,
            'uri' => new Uri,
            'server' => new Value([])
        ];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertInstanceOf(HttpUri::class, $request->getUri());
    }
}
