<?php
/**
 *
 */

namespace Valar\Http\Config;

use const Mvc5\{ FRAGMENT, HOST, QUERY, PATH, PASS, PORT, SCHEME, USER };

trait Uri
{
    /**
     *
     */
    use \Mvc5\Http\Config\Uri;

    /**
     * @return string
     */
    function getAuthority() : string
    {
        $host = $this->host();
        $port = $this->port();
        $userInfo = $this->getUserInfo();

        return !$host ? '' : (
            !$userInfo ? $host : $userInfo . '@' . $host . ($port && 80 !== $port && 443 !== $port ? ':' . $port : '')
        );
    }

    /**
     * @return string
     */
    function getFragment() : string
    {
        return (string) $this->fragment();
    }

    /**
     * @return string
     */
    function getHost() : string
    {
        return (string) $this->host();
    }

    /**
     * @return string
     */
    function getPath() : string
    {
        return (string) $this->path();
    }

    /**
     * @return null|int
     */
    function getPort() : ?int
    {
        return $this->port();
    }

    /**
     * @return string
     */
    function getQuery() : string
    {
        return (string) $this->query();
    }

    /**
     * @return string
     */
    function getScheme() : string
    {
        return (string) $this->scheme();
    }

    /**
     * @return string
     */
    function getUserInfo() : string
    {
        return !$this->user() ? '' : $this->user() . ($this->password() ? ':' . $this->password() : '');
    }

    /**
     * @param string $fragment
     * @return mixed|self
     */
    function withFragment($fragment)
    {
        return $this->with(FRAGMENT, $fragment);
    }

    /**
     * @param $host
     * @return mixed|self
     */
    function withHost($host)
    {
        return $this->with(HOST, $host);
    }

    /**
     * @param $path
     * @return mixed|self
     */
    function withPath($path)
    {
        return $this->with(PATH, $path);
    }

    /**
     * @param $port
     * @return mixed|self
     */
    function withPort($port)
    {
        return $this->with(PORT, $port);
    }

    /**
     * @param $query
     * @return mixed|self
     */
    function withQuery($query)
    {
        return $this->with(QUERY, $query);
    }

    /**
     * @param $scheme
     * @return mixed|self
     */
    function withScheme($scheme)
    {
        return $this->with(SCHEME, $scheme);
    }

    /**
     * @param $user
     * @param null $password
     * @return mixed|self
     */
    function withUserInfo($user, $password = null)
    {
        return $this->with([USER => $user, PASS => $password]);
    }
}
