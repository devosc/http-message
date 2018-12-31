<?php
/**
 *
 */

use Mvc5\Plugin\NullValue;
use Valar\Plugin\Authenticated;
use Valar\Plugin\AcceptsJson;
use Valar\Plugin\Args;
use Valar\Plugin\Attributes;
use Valar\Plugin\Body;
use Valar\Plugin\ClientAddress;
use Valar\Plugin\Cookies;
use Valar\Plugin\Data;
use Valar\Plugin\Files;
use Valar\Plugin\Headers;
use Valar\Plugin\Method;
use Valar\Plugin\Server;
use Valar\Plugin\Session;
use Valar\Plugin\RequestTarget;
use Valar\Plugin\Uri;
use Valar\Plugin\User;
use Valar\Plugin\UserAgent;
use Valar\Plugin\Version;

return [
    'authenticated' => new Authenticated,
    'accepts_json' => new AcceptsJson,
    'args'           => new Args,
    //'attributes'     => new Attributes,
    //'body'           => new Body,
    'client_address' => new ClientAddress,
    'controller'     => new NullValue,
    //'cookies'        => new Cookies,
    'data'           => new Data,
    'error'          => new NullValue,
    'exception'      => new NullValue,
    //'files'          => new Files,
    'headers'        => new Headers,
    'matched'        => new NullValue,
    //'method'         => new Method,
    'name'           => new NullValue,
    'params'         => new NullValue,
    'parent'         => new NullValue,
    'route'          => new NullValue,
    'server'         => new Server,
    'session'        => new Session,
    'target'         => new RequestTarget,
    'uri'            => new Uri,
    'user'           => new User,
    'user_agent'     => new UserAgent,
    //'version'        => new Version,
];
