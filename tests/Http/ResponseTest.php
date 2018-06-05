<?php
/**
 *
 */

namespace Valar\Test\Http;

use Mvc5\Http\HttpHeaders;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Valar\Http\Response;
use Zend\Diactoros\PhpInputStream;

class ResponseTest
    extends TestCase
{
    /**
     *
     */
    function test_get_body()
    {
        $response = new Response(['body' => new PhpInputStream]);

        $this->assertInstanceOf(PhpInputStream::class, $response->body());
    }

    /**
     *
     */
    function test_get_header()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz']])]);

        $this->assertEquals(['bar', 'baz'], $response->getHeader('foo'));
    }

    /**
     *
     */
    function test_get_header_line()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz']])]);

        $this->assertEquals('bar, baz', $response->getHeaderLine('foo'));
    }

    /**
     *
     */
    function test_get_headers()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => ['bar', 'baz']])]);

        $this->assertEquals(['foo' => ['bar', 'baz']], $response->getHeaders());
    }

    /**
     *
     */
    function test_get_protocol_version()
    {
        $response = new Response(['version' => '1.1']);

        $this->assertEquals('1.1', $response->getProtocolVersion());
    }

    /**
     *
     */
    function test_get_reason_phrase()
    {
        $response = new Response(['reason' => "I'm a teapot."]);

        $this->assertEquals("I'm a teapot.", $response->getReasonPhrase());
    }

    /**
     *
     */
    function test_get_status_code()
    {
        $response = new Response(['status' => 500]);

        $this->assertEquals(500, $response->getStatusCode());
    }

    /**
     *
     */
    function test_has_header()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $this->assertTrue($response->hasHeader('foo'));
    }

    /**
     *
     */
    function test_with_body()
    {
        $response = (new Response)->withBody(new PhpInputStream);

        $this->assertInstanceOf(StreamInterface::class, $response->getBody());
    }

    /**
     *
     */
    function test_with_added_header()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $response = $response->withAddedHeader('foo', 'baz');

        $this->assertEquals(['foo' => ['bar', 'baz']], $response->getHeaders());
    }

    /**
     *
     */
    function test_with_header()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => 'bar'])]);

        $response = $response->withHeader('foo', 'baz');

        $this->assertEquals(['foo' => ['baz']], $response->getHeaders());
    }

    /**
     *
     */
    function test_without_header()
    {
        $response = new Response(['headers' => new HttpHeaders(['Foo' => 'bar', 'Baz' => 'bat'])]);

        $response = $response->withoutHeader('foo');

        $this->assertEquals(['baz' => ['bat']], $response->getHeaders());
    }

    /**
     *
     */
    function test_with_protocol_version()
    {
        $response = (new Response)->withProtocolVersion('2.0');

        $this->assertEquals('2.0', $response->getProtocolVersion());
    }

    /**
     *
     */
    function test_with_status()
    {
        $response = (new Response)->withStatus(500);

        $this->assertEquals(500, $response->getStatusCode());
    }
}
