<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Data;
use Valar\Plugin\ServerRequest;

class DataTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test_json()
    {
        $plugins = [
            'body' => new Value('{"foo":"bar"}'),
            'data' => new Data,
            'headers' => new Value(['content-type' => 'application/json'])
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals(['foo' => 'bar'], $request->getParsedBody());
    }

    /**
     * @throws \Throwable
     */
    function test_post()
    {
        $GLOBALS['_POST'] = ['foo' => 'bar'];

        $plugins = ['data' => new Data];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals(['foo' => 'bar'], $request->getParsedBody());
    }
}
