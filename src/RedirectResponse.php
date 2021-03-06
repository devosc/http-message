<?php
/**
 *
 */

namespace Valar;

class RedirectResponse
    extends Response
{
    /**
     * @param $url
     * @param int $status
     * @param array $headers
     * @param array $config
     */
    function __construct($url, $status = 302, array $headers = [], array $config = [])
    {
        parent::__construct(null, $status, $headers + ['location' => (string) $url], $config);
    }
}
