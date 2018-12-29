<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Http\HttpHeaders;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Cookies;
use Valar\ServerRequest;

class CookiesTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $GLOBALS['_COOKIE'] = ['foo' => 'bar'];

        $plugins = ['cookies' => new Cookies];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals(['foo' => 'bar'], $request->getCookieParams());
    }

    /**
     * @throws \Throwable
     */
    function test_factory()
    {
        $GLOBALS['_COOKIE'] = ['foo' => 'bar'];

        $plugins = ['cookies' => new Cookies, 'headers' => new HttpHeaders(['cookie' => 'foo=baz; foo.bar=foobar'])];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals(['foo' => 'baz', 'foo.bar' => 'foobar'], $request->getCookieParams());
    }
}
