<?php
/**
 *
 */

namespace Valar\Request\Config;

use Mvc5\Arg;
use Mvc5\Request\Config\Request as _Config;
use Mvc5\Service\Service;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;
use Valar\Http\Config\Request as _Request;


trait Request
{
    /**
     *
     */
    use _Config;
    use _Request;

    /**
     * @var HttpRequest
     */
    protected $http;

    /**
     * @var Service
     */
    protected $service;

    /**
     * @param array|\ArrayAccess $config
     * @param Service $service
     */
    function __construct($config, Service $service)
    {
        $this->config  = $config;
        $this->http    = new HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
        $this->service = $service;
    }

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
    function getAttributes()
    {
        return $this[Arg::ATTRIBUTES] ?? [];
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
        $attributes = $this->getAttributes();
        $attributes[$name] = $value;

        return $this->with(Arg::ATTRIBUTES, $attributes);
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
        $attributes = $this->getAttributes();
        unset($attributes[$name]);

        return $this->with(Arg::ATTRIBUTES, $attributes);
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
