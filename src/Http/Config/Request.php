<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Mvc5\Http\Headers as HttpHeaders;
use Psr\Http\Message\UriInterface;

trait Request
{
    /**
     *
     */
    use Message;

    /**
     * @return string
     */
    function getMethod()
    {
        return $this[Arg::METHOD];
    }

    /**
     * @return string
     */
    function getRequestTarget()
    {
        return $this['target'];
    }

    /**
     * @return mixed|UriInterface
     */
    function getUri()
    {
        return $this[Arg::URI];
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
     * @param $requestTarget
     * @return mixed|self
     */
    function withRequestTarget($requestTarget)
    {
        return $this->with('target', $requestTarget);
    }

    /**
     * @param UriInterface $uri
     * @param bool $preserveHost
     * @return mixed|self
     */
    function withUri(UriInterface $uri, $preserveHost = false)
    {
        $host = $uri->getHost();
        $name = ucfirst(Arg::HOST);

        if (!$host || ($preserveHost && $this->hasHeader($name))) {
            return $this->with(Arg::URI, $uri);
        }

        $port = $uri->getPort();

        return $this->withHeader($name, $host . ($port ? ':' . $port : ''));
    }
}
