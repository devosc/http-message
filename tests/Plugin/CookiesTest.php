<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Http\HttpHeaders;
use Mvc5\Plugin\Scope;
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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['foo' => 'bar'], $request->getCookieParams());
    }

    /**
     * @throws \Throwable
     */
    function test_factory()
    {
        $GLOBALS['_COOKIE'] = ['foo' => 'bar'];

        $plugins = ['cookies' => new Cookies, 'headers' => new HttpHeaders(['cookie' => 'foo=baz; foo.bar=foobar'])];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['foo' => 'baz', 'foo.bar' => 'foobar'], $request->getCookieParams());
    }
}
