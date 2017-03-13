<?php
/**
 *
 */

namespace Valar\Http\Config;

use Mvc5\Arg;
use Mvc5\Http\Headers as HttpHeaders;

trait Response
{
    /**
     *
     */
    use Message;

    /**
     * @return null|string
     */
    function getReasonPhrase()
    {
        return $this[Arg::REASON];
    }

    /**
     * @return null|string
     */
    function getStatusCode()
    {
        return $this[Arg::STATUS];
    }

    /**
     * @param $code
     * @param string $reasonPhrase
     * @return mixed|self
     */
    function withStatus($code, $reasonPhrase = '')
    {
        $new = $this->with(Arg::STATUS, $code);

        $new[Arg::REASON] = $reasonPhrase;

        return $new;
    }
}
