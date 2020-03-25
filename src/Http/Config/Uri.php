<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Http;

use const Mvc5\{ FRAGMENT, HOST, QUERY, PATH, PASS, PORT, SCHEME, USER };

trait Uri
{
    /**
     *
     */
    use Http\Config\Uri;

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
     * @return Http\Uri|mixed
     */
    function withFragment($fragment) : Http\Uri
    {
        return $this->with(FRAGMENT, $fragment);
    }

    /**
     * @param $host
     * @return Http\Uri|mixed
     */
    function withHost($host) : Http\Uri
    {
        return $this->with(HOST, $host);
    }

    /**
     * @param $path
     * @return Http\Uri|mixed
     */
    function withPath($path) : Http\Uri
    {
        return $this->with(PATH, $path);
    }

    /**
     * @param $port
     * @return Http\Uri|mixed
     */
    function withPort($port) : Http\Uri
    {
        return $this->with(PORT, $port);
    }

    /**
     * @param $query
     * @return Http\Uri|mixed
     */
    function withQuery($query) : Http\Uri
    {
        return $this->with(QUERY, $query);
    }

    /**
     * @param $scheme
     * @return Http\Uri|mixed
     */
    function withScheme($scheme) : Http\Uri
    {
        return $this->with(SCHEME, $scheme);
    }

    /**
     * @param $user
     * @param null $password
     * @return Http\Uri|mixed
     */
    function withUserInfo($user, $password = null) : Http\Uri
    {
        return $this->with([USER => $user, PASS => $password]);
    }
}
