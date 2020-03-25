<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Http;
use Psr\Http\Message\StreamInterface;

use function implode;
use function is_string;

use const Mvc5\{ BODY, HEADERS, REASON, STATUS, VERSION };

trait Response
{
    /**
     *
     */
    use Http\Config\Response;

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
        return isset($this[HEADERS][$name]);
    }

    /**
     * @param StreamInterface $body
     * @return Http\Response|mixed
     */
    function withBody(StreamInterface $body) : Http\Response
    {
        return $this->with(BODY, $body);
    }

    /**
     * @param $name
     * @param $value
     * @return Http\Response|mixed
     */
    function withAddedHeader($name, $value) : Http\Response
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
     * @return Http\Response|mixed
     */
    function withHeader($name, $value) : Http\Response
    {
        return $this->with(HEADERS, $this->headers()->with($name, $value));
    }

    /**
     * @param $name
     * @return Http\Response|mixed
     */
    function withoutHeader($name) : Http\Response
    {
        return $this->with(HEADERS, $this->headers()->without($name));
    }

    /**
     * @param $version
     * @return Http\Response|mixed
     */
    function withProtocolVersion($version) : Http\Response
    {
        return $this->with(VERSION, $version);
    }

    /**
     * @param $code
     * @param string $reasonPhrase
     * @return Http\Response|mixed
     */
    function withStatus($code, $reasonPhrase = '') : Http\Response
    {
        return $this->with([STATUS => $code, REASON => $reasonPhrase]);
    }
}
