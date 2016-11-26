<?php

/**
 * Represents HTTP server.
 */
final class EventHttp
{
    /**
     * Makes an HTTP server accept connections on the specified socket stream or
     * resource.
     *
     * The socket should be ready to accept connections. Can be called multiple times to
     * accept connections on different sockets.
     *
     * Note:
     * To bind a socket, listen, and accept connections on the socket in s single call
     * use EventHttp::bind(). EventHttp::accept() is needed only if one already has a
     * socket ready to accept connections.
     *
     * @param resource|int $socket Socket resource, stream or numeric file descriptor
     *                             representing a socket ready to accept connections.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttp.accept.php
     */
    public function accept($socket): bool
    {
    }

    /**
     * Adds a server alias to the HTTP server object.
     *
     * @param string $alias The alias to add.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttp.addserveralias.php
     */
    public function addServerAlias(string $alias): bool
    {
    }

    /**
     * Binds an HTTP server on the specified address and port.
     *
     * Can be called multiple times to bind the same HTTP server to multiple different
     * ports.
     *
     * @param string $address A string containing the IP address to listen(2) on.
     * @param int    $port    The port number to listen on.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttp.bind.php
     */
    public function bind(string $address, int $port): bool
    {
    }

    /**
     * Constructs EventHttp object (the HTTP server).
     *
     * @param EventBase            $base Associated event base.
     * @param EventSslContext|null $ctx  [optional] EventSslContext class object. Turns
     *                                   plain HTTP server into HTTPS server. It means
     *                                   that if ctx is configured correctly, then the
     *                                   underlying buffer events will be based on
     *                                   OpenSSL sockets. Thus, all traffic will pass
     *                                   through the SSL or TLS.
     *
     *                                   Note: This parameter is available only if Event
     *                                   is compiled with OpenSSL support and only with
     *                                   Libevent 2.1.0-alpha and higher.
     *
     * @link http://php.net/manual/en/eventhttp.construct.php
     */
    public function __construct(EventBase $base, EventSslContext $ctx = null)
    {
    }

    /**
     * Removes server alias.
     *
     * @param string $alias The alias to remove.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttp.removeserveralias.php
     * @see  EventHttp::addServerAlias()
     */
    public function removeServerAlias(string $alias): bool
    {
    }

    /**
     * Sets the what HTTP methods are supported in requests accepted by this server, and
     * passed to user callbacks.
     *
     * Sets the what HTTP methods are supported in requests accepted by this server, and
     * passed to user callbacks. If not supported they will generate a "405 Method not
     * allowed" response. By default this includes the following methods: GET, POST,
     * HEAD, PUT, DELETE. See EventHttpRequest::CMD_* constants.
     *
     * @param int $methods A bit mask of EventHttpRequest::CMD_* constants.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.setallowedmethods.php
     */
    public function setAllowedMethods(int $methods): void
    {
    }

    /**
     * Sets a callback for specified URI.
     *
     * @param string      $path     The path for which to invoke the callback.
     * @param string      $cb       The callback callable that gets invoked on requested
     *                              path.
     *
     * @param string|null $arg      [optional] Custom data.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.setcallback.php
     */
    public function setCallback(string $path, string $cb, string $arg = null): void
    {
    }

    /**
     * Sets default callback to handle requests that are not caught by specific callbacks.
     *
     * @param string      $cb  The callback callable.
     * @param string|null $arg User custom data passed to the callback.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.setdefaultcallback.php
     */
    public function setDefaultCallback(string $cb, string $arg = null): void
    {
    }

    /**
     * Sets maximum request body size.
     *
     * @param int $value The body size in bytes.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.setmaxbodysize.php
     */
    public function setMaxBodySize(int $value): void
    {
    }

    /**
     * Sets maximum HTTP header size.
     *
     * @param int $value The header size in bytes.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.setmaxheaderssize.php
     */
    public function setMaxHeadersSize(int $value): void
    {
    }

    /**
     * Sets the timeout for an HTTP request.
     *
     * @param int $value The timeout in seconds.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttp.settimeout.php
     */
    public function setTimeout(int $value): void
    {
    }
}
