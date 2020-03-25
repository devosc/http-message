<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Cookie\HttpCookies;
use Mvc5\Http;

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
     * @return Http\Request|mixed
     */
    function withAttribute($name, $value) : Http\Request
    {
        return $this->with(ATTRIBUTES, with($this->getAttributes(), $name, $value));
    }

    /**
     * @param $name
     * @return Http\Request|mixed
     */
    function withoutAttribute($name) : Http\Request
    {
        return $this->with(ATTRIBUTES, without($this->getAttributes(), $name));
    }

    /**
     * @param array $cookies
     * @return Http\Request|mixed
     */
    function withCookieParams(array $cookies) : Http\Request
    {
        return $this->with(COOKIES, new HttpCookies($cookies));
    }

    /**
     * @param $data
     * @return Http\Request|mixed
     */
    function withParsedBody($data) : Http\Request
    {
        return $this->with(DATA, $data);
    }

    /**
     * @param array $query
     * @return Http\Request|mixed
     */
    function withQueryParams(array $query) : Http\Request
    {
        return $this->with(ARGS, $query);
    }

    /**
     * @param array $uploadedFiles
     * @return Http\Request|mixed
     */
    function withUploadedFiles(array $uploadedFiles) : Http\Request
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
