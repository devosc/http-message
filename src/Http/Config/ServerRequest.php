<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Mvc5\Cookie\HttpCookies;

trait ServerRequest
{
    /**
     *
     */
    use Request;

    /**
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    function getAttribute($name, $default = null)
    {
        return $this[Arg::ATTRIBUTES][$name] ?? $default;
    }

    /**
     * @return array
     */
    function getAttributes() : array
    {
        return $this[Arg::ATTRIBUTES] ?? [];
    }

    /**
     * @return array
     */
    function getCookieParams() : array
    {
        return $this[Arg::COOKIES]->all();
    }

    /**
     * @return mixed
     */
    function getParsedBody()
    {
        return $this[Arg::DATA];
    }

    /**
     * @return array
     */
    function getQueryParams() : array
    {
        return $this[Arg::ARGS] ?? [];
    }

    /**
     * @return array
     */
    function getServerParams() : array
    {
        return $this[Arg::SERVER] ?? [];
    }

    /**
     * @return array
     */
    function getUploadedFiles() : array
    {
        return $this[Arg::FILES] ?? [];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withAttribute($name, $value)
    {
        return $this->with(Arg::ATTRIBUTES, with($this->getAttributes(), $name, $value));
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutAttribute($name)
    {
        return $this->with(Arg::ATTRIBUTES, without($this->getAttributes(), $name));
    }

    /**
     * @param array $cookies
     * @return mixed|self
     */
    function withCookieParams(array $cookies)
    {
        return $this->with(Arg::COOKIES, new HttpCookies($cookies));
    }

    /**
     * @param $data
     * @return mixed|self
     */
    function withParsedBody($data)
    {
        return $this->with(Arg::DATA, $data);
    }

    /**
     * @param array $query
     * @return mixed|self
     */
    function withQueryParams(array $query)
    {
        return $this->with(Arg::ARGS, $query);
    }

    /**
     * @param array $uploadedFiles
     * @return mixed|self
     */
    function withUploadedFiles(array $uploadedFiles)
    {
        return $this->with(Arg::FILES, $uploadedFiles);
    }
}

/**
 * @param array $data
 * @param string $name
 * @param $value
 * @return array
 */
function with(array $data, string $name, $value) : array
{
    $data[$name] = $value;
    return $data;
}

/**
 * @param array $data
 * @param string $name
 * @return array
 */
function without(array $data, string $name) : array
{
    unset($data[$name]);
    return $data;
}
