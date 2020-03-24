<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Cookie\HttpCookies;

use const Mvc5\{ ARGS, ATTRIBUTES, COOKIES, DATA, FILES, SERVER };

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
        return $this[ATTRIBUTES][$name] ?? $default;
    }

    /**
     * @return array
     */
    function getAttributes() : array
    {
        return $this[ATTRIBUTES] ?? [];
    }

    /**
     * @return array
     */
    function getCookieParams() : array
    {
        return $this[COOKIES]->all();
    }

    /**
     * @return mixed
     */
    function getParsedBody()
    {
        return $this[DATA];
    }

    /**
     * @return array
     */
    function getQueryParams() : array
    {
        return $this[ARGS] ?? [];
    }

    /**
     * @return array
     */
    function getServerParams() : array
    {
        return $this[SERVER] ?? [];
    }

    /**
     * @return array
     */
    function getUploadedFiles() : array
    {
        return $this[FILES] ?? [];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withAttribute($name, $value)
    {
        return $this->with(ATTRIBUTES, with($this->getAttributes(), $name, $value));
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutAttribute($name)
    {
        return $this->with(ATTRIBUTES, without($this->getAttributes(), $name));
    }

    /**
     * @param array $cookies
     * @return mixed|self
     */
    function withCookieParams(array $cookies)
    {
        return $this->with(COOKIES, new HttpCookies($cookies));
    }

    /**
     * @param $data
     * @return mixed|self
     */
    function withParsedBody($data)
    {
        return $this->with(DATA, $data);
    }

    /**
     * @param array $query
     * @return mixed|self
     */
    function withQueryParams(array $query)
    {
        return $this->with(ARGS, $query);
    }

    /**
     * @param array $uploadedFiles
     * @return mixed|self
     */
    function withUploadedFiles(array $uploadedFiles)
    {
        return $this->with(FILES, $uploadedFiles);
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
