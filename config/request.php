<?php
/**
 *
 */

use Mvc5\Plugin\NullValue;
use Valar\Plugin\Accept;
use Valar\Plugin\Args;
use Valar\Plugin\Attributes;
use Valar\Plugin\Body;
use Valar\Plugin\ClientAddress;
use Valar\Plugin\ContentType;
use Valar\Plugin\Cookies;
use Valar\Plugin\Data;
use Valar\Plugin\Files;
use Valar\Plugin\Headers;
use Valar\Plugin\Method;
use Valar\Plugin\Server;
use Valar\Plugin\Session;
use Valar\Plugin\Stream;
use Valar\Plugin\RequestTarget;
use Valar\Plugin\Uri;
use Valar\Plugin\User;
use Valar\Plugin\UserAgent;
use Valar\Plugin\Version;

return [
    'accept'         => new Accept,
    'args'           => new Args,
    'attributes'     => new Attributes,
    'body'           => new Body,
    'client_address' => new ClientAddress,
    'content_type'   => new ContentType,
    'controller'     => new NullValue,
    'cookies'        => new Cookies,
    'data'           => new Data,
    'error'          => new NullValue,
    'exception'      => new NullValue,
    'files'          => new Files,
    'headers'        => new Headers,
    'matched'        => new NullValue,
    'method'         => new Method,
    'name'           => new NullValue,
    'params'         => new NullValue,
    'route'          => new NullValue,
    'server'         => new Server,
    'session'        => new Session,
    'stream'         => new Stream,
    'target'         => new RequestTarget,
    'uri'            => new Uri,
    'user'           => new User,
    'user_agent'     => new UserAgent,
    'version'        => new Version,
];
