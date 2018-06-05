<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

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
     * @return array|string|null
     */
    function getHeader($name)
    {
        return $this->headers()[$name] ?? null;
    }

    /**
     * @param $name
     * @return string
     */
    function getHeaderLine($name)
    {
        return implode(', ', (array) ($this->getHeader($name) ?? ''));
    }

    /**
     * @return array
     */
    function getHeaders()
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
    function getMethod()
    {
        return $this->method();
    }

    /**
     * @return string
     */
    function getProtocolVersion()
    {
        return $this->version();
    }

    /**
     * @return string
     */
    function getRequestTarget()
    {
        return $this[Arg::TARGET] ?? (
            ($uri = $this->getUri()) ?
                ($uri->getPath() ? : '/') . ($uri->getQuery() ? '?' . $uri->getQuery() : '') : '/'
        );
    }

    /**
     * @return UriInterface|mixed
     */
    function getUri()
    {
        return $this->uri();
    }

    /**
     * @param $name
     * @return bool
     */
    function hasHeader($name)
    {
        return isset($this[Arg::HEADERS][$name]);
    }

    /**
     * @param StreamInterface $body
     * @return mixed|self
     */
    function withBody(StreamInterface $body)
    {
        return $this->with(Arg::BODY, $body);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withAddedHeader($name, $value)
    {
        $header = $this[Arg::HEADERS][$name] ?? null;

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
        return $this->with(Arg::HEADERS, $this->headers()->with($name, $value));
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutHeader($name)
    {
        return $this->with(Arg::HEADERS, $this->headers()->without($name));
    }

    /**
     * @param $method
     * @return mixed|self
     */
    function withMethod($method)
    {
        return $this->with(Arg::METHOD, $method);
    }

    /**
     * @param $version
     * @return mixed|self
     */
    function withProtocolVersion($version)
    {
        return $this->with(Arg::VERSION, $version);
    }

    /**
     * @param $requestTarget
     * @return mixed|self
     */
    function withRequestTarget($requestTarget)
    {
        return $this->with(Arg::TARGET, $requestTarget);
    }

    /**
     * @param UriInterface $uri
     * @param bool $preserveHost
     * @return mixed|self
     */
    function withUri(UriInterface $uri, $preserveHost = false)
    {
        $host = $uri->getHost();

        if (!$host || ($preserveHost && $this->hasHeader(Arg::HOST))) {
            return $this->with(Arg::URI, $uri);
        }

        $port = $uri->getPort();

        return $this->withHeader(Arg::HOST, [$host . ($port ? ':' . $port : '')]);
    }
}
