<?php
/**
 *
 */

namespace Valar\Test\Http;

use Mvc5\Http\HttpHeaders;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Valar\Http\Request;
use Valar\Http\Uri;
use Zend\Diactoros\PhpInputStream;

class RequestTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $request = new Request([
            'headers' => ['content-type' => 'application/json'],
            'uri' => ['host' => 'phpdev', 'port' => 8000]
        ]);

        $this->assertInstanceOf(HttpHeaders::class, $request['headers']);
        $this->assertInstanceOf(Uri::class, $request['uri']);
        $this->assertEquals('phpdev:8000', $request['headers']['host']);
    }

    /**
     *
     */
    function test_get_body()
    {
        $request = new Request(['body' => new PhpInputStream]);

        $this->assertInstanceOf(PhpInputStream::class, $request->body());
    }

    /**
     *
     */
    function test_get_header()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz'], 'Bar' => 'baz'])]);

        $this->assertEquals(['bar', 'baz'], $request->getHeader('foo'));
        $this->assertEquals(['baz'], $request->getHeader('bar'));
    }

    /**
     *
     */
    function test_get_header_line()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz']])]);

        $this->assertEquals('bar, baz', $request->getHeaderLine('foo'));
    }

    /**
     *
     */
    function test_get_headers()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz']])]);

        $this->assertEquals(['foo' => ['bar', 'baz']], $request->getHeaders());
    }

    /**
     *
     */
    function test_get_method()
    {
        $request = new Request(['method' => 'POST']);

        $this->assertEquals('POST', $request->getMethod());
    }

    /**
     *
     */
    function test_get_protocol_version()
    {
        $request = new Request(['version' => '1.1']);

        $this->assertEquals('1.1', $request->getProtocolVersion());
    }

    /**
     *
     */
    function test_get_request_target()
    {
        $request = new Request(['target' => '/foo']);

        $this->assertEquals('/foo', $request->getRequestTarget());
    }

    /**
     *
     */
    function test_get_request_target_empty()
    {
        $request = new Request;

        $this->assertEquals('/', $request->getRequestTarget());
    }

    /**
     *
     */
    function test_get_request_target_from_uri()
    {
        $request = new Request(['uri' => new Uri(['path' => '/foo', 'query' => 'bar=baz'])]);

        $this->assertEquals('/foo?bar=baz', $request->getRequestTarget());
    }

    /**
     *
     */
    function test_get_uri()
    {
        $request = new Request(['uri' => new Uri(['path' => '/foo'])]);

        $this->assertInstanceOf(Uri::class, $request->getUri());
    }

    /**
     *
     */
    function test_has_header()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $this->assertTrue($request->hasHeader('foo'));
    }

    /**
     *
     */
    function test_with_body()
    {
        $request = (new Request)->withBody(new PhpInputStream);

        $this->assertInstanceOf(StreamInterface::class, $request->getBody());
    }

    /**
     *
     */
    function test_with_added_header()
    {
        $request = new Request(['headers' => new HttpHeaders]);

        $request = $request->withAddedHeader('foo', 'baz');

        $this->assertEquals(['baz'], $request->getHeader('foo'));
    }

    /**
     *
     */
    function test_with_added_header_exists()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $request = $request->withAddedHeader('foo', 'baz');

        $this->assertEquals(['bar', 'baz'], $request->getHeader('foo'));
    }

    /**
     *
     */
    function test_with_header()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $request = $request->withHeader('foo', 'baz');

        $this->assertEquals(['foo' => ['baz']], $request->getHeaders());
    }

    /**
     *
     */
    function test_without_header()
    {
        $request = new Request(['headers' => new HttpHeaders(['Foo' => 'bar', 'Baz' => 'bat'])]);

        $request = $request->withoutHeader('foo');

        $this->assertEquals(['baz' => ['bat']], $request->getHeaders());
    }

    /**
     *
     */
    function test_with_method()
    {
        $request = (new Request)->withMethod('PUT');

        $this->assertEquals('PUT', $request->getMethod());
    }

    /**
     *
     */
    function test_with_protocol_version()
    {
        $request = (new Request)->withProtocolVersion('2.0');

        $this->assertEquals('2.0', $request->getProtocolVersion());
    }

    /**
     *
     */
    function test_with_request_target()
    {
        $request = (new Request)->withRequestTarget('/foo');

        $this->assertEquals('/foo', $request->getRequestTarget());
    }

    /**
     *
     */
    function test_with_uri()
    {
        $request = (new Request)->withUri(new Uri(['path' => '/foo']));

        $this->assertEquals('/foo', $request->getUri()->getPath());
    }

    /**
     *
     */
    function test_with_uri_host()
    {
        $request = (new Request)->withUri(new Uri(['host' => 'phpdev', 'port' => 8000, 'path' => '/foo']));

        $this->assertEquals(['phpdev:8000'], $request->getHeader('host'));
    }
}
