<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Mvc5\Http\Config\Response as HttpResponse;
use Psr\Http\Message\StreamInterface;

trait Response
{
    /**
     *
     */
    use HttpResponse;

    /**
     * @return mixed|StreamInterface
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
        return implode(',', (array) ($this->getHeader($name) ?? ''));
    }

    /**
     * @return array|\ArrayAccess|mixed
     */
    function getHeaders()
    {
        return $this->headers();
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
    function getReasonPhrase()
    {
        return $this->reason();
    }

    /**
     * @return int
     */
    function getStatusCode()
    {
        return $this->status();
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

    /**
     * @param $code
     * @param string $reasonPhrase
     * @return mixed|self
     */
    function withStatus($code, $reasonPhrase = '')
    {
        return $this->with([Arg::STATUS => $code, Arg::REASON => $reasonPhrase]);
    }
}
