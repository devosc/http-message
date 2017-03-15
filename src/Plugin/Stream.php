<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Call;

class Stream
    extends Call
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct('@fopen', ['php://input', 'rb']);
    }
}
