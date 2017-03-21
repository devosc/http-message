<?php
/**
 *
 */

namespace Valar\Stream;

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
        $this->write(json_encode($data, static::ENCODE_OPTIONS));
        $this->rewind();
    }
}
