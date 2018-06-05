<?php
/**
 *
 */

namespace Valar\Test\Http;

use PHPUnit\Framework\TestCase;
use Valar\Http\Uri;

class UriTest
    extends TestCase
{
    /**
     *
     */
    function test_get_authority()
    {
        $uri = new Uri(['host' => 'localhost', 'port' => 8000, 'user' => 'foo', 'pass' => 'bar']);

        $this->assertEquals('foo:bar@localhost:8000', $uri->getAuthority());
    }

    /**
     *
     */
    function test_get_fragment()
    {
        $uri = new Uri(['fragment' => 'foo']);

        $this->assertEquals('foo', $uri->getFragment());
    }

    /**
     *
     */
    function test_get_host()
    {
        $uri = new Uri(['host' => 'foo']);

        $this->assertEquals('foo', $uri->getHost());
    }

    /**
     *
     */
    function test_get_path()
    {
        $uri = new Uri(['path' => '/foo']);

        $this->assertEquals('/foo', $uri->getPath());
    }

    /**
     *
     */
    function test_get_port()
    {
        $uri = new Uri(['port' => 8000]);

        $this->assertEquals(8000, $uri->getPort());
    }

    /**
     *
     */
    function test_get_query()
    {
        $uri = new Uri(['query' => 'foo=bar']);

        $this->assertEquals('foo=bar', $uri->getQuery());
    }

    /**
     *
     */
    function test_get_scheme()
    {
        $uri = new Uri(['scheme' => 'https']);

        $this->assertEquals('https', $uri->getScheme());
    }

    /**
     *
     */
    function test_get_user_info()
    {
        $uri = new Uri(['user' => 'foo']);

        $this->assertEquals('foo', $uri->getUserInfo());
    }

    /**
     *
     */
    function test_with_fragment()
    {
        $uri = (new Uri)->withFragment('foo');

        $this->assertEquals('foo', $uri->getFragment());
    }

    /**
     *
     */
    function test_with_host()
    {
        $uri = (new Uri)->withHost('foo');

        $this->assertEquals('foo', $uri->getHost());
    }

    /**
     *
     */
    function test_with_path()
    {
        $uri = (new Uri)->withPath('/foo');

        $this->assertEquals('/foo', $uri->getPath());
    }

    /**
     *
     */
    function test_with_port()
    {
        $uri = (new Uri)->withPort(8000);

        $this->assertEquals(8000, $uri->getPort());
    }

    /**
     *
     */
    function test_with_query()
    {
        $uri = (new Uri)->withQuery('foo=bar');

        $this->assertEquals('foo=bar', $uri->getQuery());
    }

    /**
     *
     */
    function test_with_scheme()
    {
        $uri = (new Uri)->withScheme('https');

        $this->assertEquals('https', $uri->getScheme());
    }

    /**
     *
     */
    function test_with_user_info()
    {
        $uri = (new Uri)->withUserInfo('foo', 'bar');

        $this->assertEquals('foo:bar', $uri->getUserInfo());
    }
}
