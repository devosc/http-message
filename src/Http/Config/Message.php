<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Mvc5\Http\Headers as HttpHeaders;
use Psr\Http\Message\StreamInterface;

trait Message
{
    /**
     * @return mixed
     */
    function getBody()
    {
        return $this[Arg::BODY];
    }

    /**
     * @param $name
     * @return array|string|null
     */
    function getHeader($name)
    {
        return $this[Arg::HEADERS][$name] ?? null;
    }

    /**
     * @param $name
     * @return string
     */
    function getHeaderLine($name)
    {
        return implode(',', (array) ($this->getHeader($name) ?? ''));
    }

    /**
     * @return mixed
     */
    function getHeaders()
    {
        return $this[Arg::HEADERS];
    }

    /**
     * @return string|null
     */
    function getProtocolVersion()
    {
        return $this[Arg::VERSION];
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
        $header = $this[Arg::HEADERS][$name];

        if (null === $header) {
            return $this->withHeader($name, $value);
        }

        is_string($header) && $header = [$header];

        return $this->withHeader($name, $header[] = $value);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withHeader($name, $value)
    {
        return $this->with(Arg::HEADERS, $this->getHeaders()->with($name, $value));
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutHeader($name)
    {
        return $this->with(Arg::HEADERS, $this->getHeaders()->without($name));
    }

    /**
     * @param $version
     * @return mixed|self
     */
    function withProtocolVersion($version)
    {
        return $this->with(Arg::VERSION, $version);
    }
}
