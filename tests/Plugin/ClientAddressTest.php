<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\ClientAddress;
use Valar\Plugin\ServerRequest;

class ClientAddressTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'client_address' => new ClientAddress,
            'server' => new Value(['HTTP_CLIENT_IP' => '192.168.10.1'])
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('192.168.10.1', $request->clientAddress());
    }
}
