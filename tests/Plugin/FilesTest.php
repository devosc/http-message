<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\UploadedFileInterface;
use Valar\Plugin\Files;
use Valar\ServerRequest;

class FilesTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $_FILES = [
            'foo' => [
                'name' => 'foo.txt',
                'type' => 'text/plain',
                'tmp_name' => '/tmp/f2hj0p',
                'error' => 0,
                'size' => 10,
            ]
        ];

        $plugins = ['files' => new Files];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        /** @var UploadedFileInterface $file */
        $file = $request->getUploadedFiles()['foo'];

        $this->assertInstanceOf(UploadedFileInterface::class, $file);
        $this->assertEquals('foo.txt', $file->getClientFilename());
        $this->assertEquals('text/plain', $file->getClientMediaType());
        $this->assertEquals(0, $file->getError());
        $this->assertEquals(10, $file->getSize());
    }
}
