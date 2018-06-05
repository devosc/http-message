<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Files;
use Valar\ServerRequest;
use Zend\Diactoros\UploadedFile;

class FilesTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $file = new UploadedFile('foobar', 10, 0);

        $GLOBALS['_FILES'] = ['foo' => $file];

        $plugins = ['files' => new Files];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals($file, $request->getUploadedFiles()['foo']);
    }
}
