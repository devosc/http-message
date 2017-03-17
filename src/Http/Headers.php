<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Headers\Config as HttpHeaders;

class Headers
    extends HttpHeaders
{
    /**
     * @param string $name
     * @return mixed
     */
    function get($name)
    {
        return parent::get(strtolower($name));
    }

    /**
     * @param string $name
     * @return bool
     */
    function has($name)
    {
        return parent::has(strtolower($name));
    }

    /**
     * @param string $name
     * @return void
     */
    function remove($name)
    {
        parent::remove(strtolower($name));
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    function set($name, $value)
    {
        return parent::set(strtolower($name), $value);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return self|mixed
     */
    function with($name, $value)
    {
        return parent::with(strtolower($name), $value);
    }

    /**
     * @param string $name
     * @return self|mixed
     */
    function without($name)
    {
        return parent::without(strtolower($name));
    }
}
