<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;

trait Uri
{
    /**
     *
     */
    use \Mvc5\Http\Config\Uri;

    /**
     * @return string
     */
    function getAuthority()
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
    function getFragment()
    {
        return (string) $this->fragment();
    }

    /**
     * @return string
     */
    function getHost()
    {
        return (string) $this->host();
    }

    /**
     * @return string
     */
    function getPath()
    {
        return (string) $this->path();
    }

    /**
     * @return null|int
     */
    function getPort()
    {
        return $this->port();
    }

    /**
     * @return string
     */
    function getQuery()
    {
        return (string) $this->query();
    }

    /**
     * @return string
     */
    function getScheme()
    {
        return (string) $this->scheme();
    }

    /**
     * @return string
     */
    function getUserInfo()
    {
        return !$this->user() ? '' : $this->user() . ($this->password() ? ':' . $this->password() : '');
    }

    /**
     * @param string $fragment
     * @return mixed|self
     */
    function withFragment($fragment)
    {
        return $this->with(Arg::FRAGMENT, $fragment);
    }

    /**
     * @param $host
     * @return mixed|self
     */
    function withHost($host)
    {
        return $this->with(Arg::HOST, $host);
    }

    /**
     * @param $path
     * @return mixed|self
     */
    function withPath($path)
    {
        return $this->with(Arg::PATH, $path);
    }

    /**
     * @param $port
     * @return mixed|self
     */
    function withPort($port)
    {
        return $this->with(Arg::PORT, $port);
    }

    /**
     * @param $query
     * @return mixed|self
     */
    function withQuery($query)
    {
        return $this->with(Arg::QUERY, $query);
    }

    /**
     * @param $scheme
     * @return mixed|self
     */
    function withScheme($scheme)
    {
        return $this->with(Arg::SCHEME, $scheme);
    }

    /**
     * @param $user
     * @param null $password
     * @return mixed|self
     */
    function withUserInfo($user, $password = null)
    {
        return $this->with([Arg::USER => $user, Arg::PASS => $password]);
    }
}
