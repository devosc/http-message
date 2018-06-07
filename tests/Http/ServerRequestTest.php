<?php
/**
 *
 */

namespace Valar\Test\Http;

use Mvc5\Cookie\HttpCookies;
use Valar\Http\ServerRequest;
use PHPUnit\Framework\TestCase;

class ServerRequestTest
    extends TestCase
{
    /**
     *
     */
    function test_get_attribute()
    {
        $request = new ServerRequest(['attributes' => ['foo' => 'bar']]);

        $this->assertEquals('bar', $request->getAttribute('foo'));
        $this->assertEquals('bat', $request->getAttribute('baz', 'bat'));
    }

    /**
     *
     */
    function test_get_attributes()
    {
        $request = new ServerRequest(['attributes' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getAttributes());
    }

    /**
     *
     */
    function test_get_cookie_params()
    {
        $request = new ServerRequest(['cookies' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getCookieParams());
    }

    /**
     *
     */
    function test_get_cookie_params_from_http_cookies()
    {
        $request = new ServerRequest(['cookies' => new HttpCookies(['foo' => 'bar'])]);

        $this->assertEquals(['foo' => 'bar'], $request->getCookieParams());
    }

    /**
     *
     */
    function test_get_parsed_body()
    {
        $request = new ServerRequest(['data' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getParsedBody());
    }

    /**
     *
     */
    function test_get_query_params()
    {
        $request = new ServerRequest(['args' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getQueryParams());
    }

    /**
     *
     */
    function test_get_server_params()
    {
        $request = new ServerRequest(['server' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getServerParams());
    }

    /**
     *
     */
    function test_get_uploaded_files()
    {
        $request = new ServerRequest(['files' => ['foo' => 'bar']]);

        $this->assertEquals(['foo' => 'bar'], $request->getUploadedFiles());
    }

    /**
     *
     */
    function test_with_attribute()
    {
        $request = new ServerRequest(['attributes' => ['foo' => 'bar']]);

        $this->assertInstanceOf(ServerRequest::class, $request->withAttribute('baz', 'bat'));
    }

    /**
     *
     */
    function test_with_cookie_params()
    {
        $request = new ServerRequest;

        $this->assertInstanceOf(ServerRequest::class, $request->withCookieParams(['foo' => 'bar']));
    }

    /**
     *
     */
    function test_without_attribute()
    {
        $request = new ServerRequest(['attributes' => ['foo' => 'bar', 'baz' => 'bat']]);

        $this->assertInstanceOf(ServerRequest::class, $request->withoutAttribute('baz'));
    }

    /**
     *
     */
    function test_with_parsed_body()
    {
        $request = new ServerRequest;

        $this->assertInstanceOf(ServerRequest::class, $request->withParsedBody(['foo' => 'bar']));
    }

    /**
     *
     */
    function test_with_query_params()
    {
        $request = new ServerRequest;

        $this->assertInstanceOf(ServerRequest::class, $request->withQueryParams(['foo' => 'bar']));
    }

    /**
     *
     */
    function test_with_uploaded_files()
    {
        $request = new ServerRequest;

        $this->assertInstanceOf(ServerRequest::class, $request->withUploadedFiles(['foo' => 'bar']));
    }
}
