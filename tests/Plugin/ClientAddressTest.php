<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\ClientAddress;
use Valar\ServerRequest;

class ClientAddressTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = [
            'client_address' => new ClientAddress,
            'server' => new Value(['HTTP_CLIENT_IP' => '192.168.10.1'])
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('192.168.10.1', $request->clientAddress());
    }
}
