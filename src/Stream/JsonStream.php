<?php
/**
 *
 */

namespace Valar\Stream;

use Mvc5\Exception;
use Zend\Diactoros\Stream;

class JsonStream
    extends Stream
{
    /**
     * JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES
     */
    const ENCODE_OPTIONS = 79;

    /**
     * @param $data
     */
    function __construct($data)
    {
        parent::__construct('php://memory', 'wb+');
        $this->write($this->result(json_encode($data, static::ENCODE_OPTIONS)));
        $this->rewind();
    }

    /**
     * @param $result
     * @return string
     */
    protected function result($result) : string
    {
        return JSON_ERROR_NONE === json_last_error() ? $result :
            Exception::invalidArgument('JSON Encode Error: ' . json_last_error_msg());
    }
}
