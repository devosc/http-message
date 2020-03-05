<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Data;
use Valar\ServerRequest;

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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['foo' => 'bar'], $request->getParsedBody());
    }

    /**
     * @throws \Throwable
     */
    function test_post()
    {
        $GLOBALS['_POST'] = ['foo' => 'bar'];

        $plugins = ['data' => new Data];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['foo' => 'bar'], $request->getParsedBody());
    }
}
