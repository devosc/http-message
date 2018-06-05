<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Call;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\ServerRequestFactory;

class Files
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'files')
    {
        parent::__construct(
            $name, new Call('@' . ServerRequestFactory::class . '::normalizeFiles', [new GlobalVar('_FILES')])
        );
    }
}
