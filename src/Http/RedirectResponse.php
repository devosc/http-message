<?php
/**
 *
 */

namespace Valar\Http;

use const Mvc5\{ HEADERS, STATUS };

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
        parent::__construct([STATUS => $status, HEADERS => $headers + ['location' => (string) $url]]);
    }
}
