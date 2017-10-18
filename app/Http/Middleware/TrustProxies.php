<?php

namespace DoeSangue\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies
{
    /**
     * The trust proxies for this application.
     *
     * @var array
     */
    protected $proxies;


    protected $headers = [
      Request::HEADER_FORWARDED => 'FORWRDED',
      Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
      Request::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
      Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
      Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
    ];
}