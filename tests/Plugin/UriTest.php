<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Http\HttpHeaders;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Http\Uri as HttpUri;
use Valar\Plugin\Uri;
use Valar\ServerRequest;

class UriTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = [
            'headers' => new HttpHeaders,
            'uri' => new Uri,
            'server' => new Value([])
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config, new App);
        $config->scope($request);

        $this->assertInstanceOf(HttpUri::class, $request->getUri());
    }
}
