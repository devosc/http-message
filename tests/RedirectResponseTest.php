<?php
/**
 *
 */

namespace Valar\Test;

use PHPUnit\Framework\TestCase;
use Valar\RedirectResponse;

class RedirectResponseTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $response = new RedirectResponse('/foo');

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('/foo', $response->getHeaderLine('location'));
    }
}
