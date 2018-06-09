<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Psr\Http\Message\StreamInterface;

use function implode;
use function is_string;

trait Response
{
    /**
     *
     */
    use \Mvc5\Http\Config\Response;

    /**
     * @return mixed|StreamInterface
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
    function getProtocolVersion() : string
    {
        return $this->version();
    }

    /**
     * @return string
     */
    function getReasonPhrase() : string
    {
        return $this->reason();
    }

    /**
     * @return int
     */
    function getStatusCode() : int
    {
        return $this->status();
    }

    /**
     * @param $name
     * @return bool
     */
    function hasHeader($name) : bool
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
