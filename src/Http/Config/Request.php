<?php
/**
 *
 */

namespace Valar\Http\Config;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

use function implode;
use function is_string;

use const Mvc5\{ BODY, HEADERS, HOST, METHOD, TARGET, URI, VERSION };

trait Request
{
    /**
     *
     */
    use \Mvc5\Http\Config\Request;

    /**
     * @return StreamInterface|mixed
     */
    function getBody()
    {
        return $this->body();
    }

    /**
     * @param $name
     * @return array
     */
    function getHeader($name) : array
    {
        return (array) ($this->headers()[$name] ?? null);
    }

    /**
     * @param $name
     * @return string
     */
    function getHeaderLine($name) : string
    {
        return implode(', ', $this->getHeader($name));
    }

    /**
     * @return array
     */
    function getHeaders() : array
    {
        $headers = [];

        foreach($this->headers() as $key => $value) {
            $headers[$key] = (array) $value;
        }

        return $headers;
    }

    /**
     * @return string
     */
    function getMethod() : string
    {
        return $this->method();
    }

    /**
     * @return string
     */
    function getProtocolVersion() : string
    {
        return $this->version();
    }

    /**
     * @return string
     */
    function getRequestTarget() : string
    {
        /** @var UriInterface $uri */
        return $this[TARGET] ?? (
            ($uri = $this[URI]) ?
                ($uri->getPath() ? : '/') . ($uri->getQuery() ? '?' . $uri->getQuery() : '') : '/'
        );
    }

    /**
     * @return UriInterface
     */
    function getUri() : UriInterface
    {
        return $this[URI];
    }

    /**
     * @param $name
     * @return bool
     */
    function hasHeader($name) : bool
    {
        return isset($this[HEADERS][$name]);
    }

    /**
     * @param StreamInterface $body
     * @return mixed|self
     */
    function withBody(StreamInterface $body)
    {
        return $this->with(BODY, $body);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withAddedHeader($name, $value)
    {
        $header = $this[HEADERS][$name] ?? null;

        if (null === $header) {
            return $this->withHeader($name, $value);
        }

        is_string($header) && $header = [$header];

        $header[] = $value;

        return $this->withHeader($name, $header);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withHeader($name, $value)
    {
        return $this->with(HEADERS, $this->headers()->with($name, $value));
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutHeader($name)
    {
        return $this->with(HEADERS, $this->headers()->without($name));
    }

    /**
     * @param $method
     * @return mixed|self
     */
    function withMethod($method)
    {
        return $this->with(METHOD, $method);
    }

    /**
     * @param $version
     * @return mixed|self
     */
    function withProtocolVersion($version)
    {
        return $this->with(VERSION, $version);
    }

    /**
     * @param $requestTarget
     * @return mixed|self
     */
    function withRequestTarget($requestTarget)
    {
        return $this->with(TARGET, $requestTarget);
    }

    /**
     * @param UriInterface $uri
     * @param bool $preserveHost
     * @return mixed|self
     */
    function withUri(UriInterface $uri, $preserveHost = false)
    {
        $host = $uri->getHost();

        if (!$host || ($preserveHost && $this->hasHeader(HOST))) {
            return $this->with(URI, $uri);
        }

        $headers = $this->headers()->with(HOST, $host . (($port = $uri->getPort()) ? ':' . $port : ''));

        return $this->with([HEADERS => $headers, URI => $uri]);
    }
}
