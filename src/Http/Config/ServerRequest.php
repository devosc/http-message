<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;

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
        return $this['attributes'][$name] ?? $default;
    }

    /**
     * @return array|mixed
     */
    function getAttributes()
    {
        return $this['attributes'];
    }

    /**
     * @return mixed
     */
    function getCookieParams()
    {
        return $this[Arg::COOKIES];
    }

    /**
     * @return mixed
     */
    function getParsedBody()
    {
        return $this[Arg::DATA];
    }

    /**
     * @return mixed
     */
    function getQueryParams()
    {
        return $this[Arg::ARGS];
    }

    /**
     * @return array
     */
    function getServerParams()
    {
        return $this[Arg::SERVER];
    }

    /**
     * @return array
     */
    function getUploadedFiles()
    {
        return $this[Arg::FILES];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|self
     */
    function withAttribute($name, $value)
    {
        return $this->with('attributes', $this->getAttributes()->with($name, $value));
    }

    /**
     * @param array $cookies
     * @return mixed|self
     */
    function withCookieParams(array $cookies)
    {
        return $this->with(Arg::COOKIES, $cookies);
    }

    /**
     * @param $name
     * @return mixed|self
     */
    function withoutAttribute($name)
    {
        return $this->with('attributes', $this->getAttributes()->without($name));
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
