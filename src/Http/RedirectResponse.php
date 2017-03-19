<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;

class RedirectResponse
    extends Response
{
    /**
     * @param $url
     * @param int $status
     * @param array $headers
     */
    function __construct($url, $status = 302, array $headers = [])
    {
        parent::__construct([Arg::STATUS => $status, Arg::HEADERS => $headers + ['Location' => (string) $url]]);
    }
}
