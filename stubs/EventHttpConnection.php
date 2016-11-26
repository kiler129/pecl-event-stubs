<?php

class EventHttpConnection
{
    /**
     * Constructs EventHttpConnection object.
     *
     * @param EventBase            $base     Associated event base.
     * @param EventDnsBase         $dns_base If dns_base is NULL, hostname resolution
     *                                       will block.
     * @param string               $address  The address to connect to.
     * @param int                  $port     The port to connect to.
     * @param EventSslContext|null $ctx      [optional] EventSslContext class object.
     *                                       Enables OpenSSL.
     *
     *                                       Note: This parameter is available only if
     *                                       Event is compiled with OpenSSL support and
     *                                       only with Libevent 2.1.0-alpha and higher.
     *
     * @link http://php.net/manual/en/eventhttpconnection.construct.php
     */
    public function __construct(
        EventBase $base,
        EventDnsBase $dns_base,
        string $address,
        int $port,
        EventSslContext $ctx = null)
    {
    }

    /**
     * Returns event base associated with the connection.
     *
     * @return EventBase|bool On success returns EventBase object associated with the
     *                        connection. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttpconnection.getbase.php
     */
    public function getBase()
    {
    }

    /**
     * Gets the remote address and port associated with the connection.
     *
     * @param string &$address Address of the peer.
     * @param int    &$port    Port of the peer.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.getpeer.php
     */
    public function getPeer(string &$address, int &$port): void
    {
    }

    /**
     * Makes an HTTP request over the specified connection.
     *
     * @param EventHttpRequest $req  The connection object over which to send the request.
     * @param int              $type One of EventHttpRequest::CMD_* constants.
     * @param string           $uri  The URI associated with the request.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttpconnection.makerequest.php
     */
    public function makeRequest(EventHttpRequest $req, int $type, string $uri): bool
    {
    }

    /**
     * Set callback for connection close.
     *
     * @param callable   $callback Callback which is called when connection is closed.
     * @param mixed|null $data     [optional]
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setclosecallback.php
     */
    public function setCloseCallback(callable $callback, mixed $data = null): void
    {
    }

    /**
     * Sets the IP address from which HTTP connections are made.
     *
     * @param string $address The IP address from which HTTP connections are made.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setlocaladdress.php
     */
    public function setLocalAddress(string $address): void
    {
    }

    /**
     * Sets the local port from which connections are made.
     *
     * @param int $port The port number.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setlocalport.php
     */
    public function setLocalPort(int $port): void
    {
    }

    /**
     * Sets maximum body size for the connection.
     *
     * @param string $max_size The maximum body size in bytes.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setmaxbodysize.php
     */
    public function setMaxBodySize(string $max_size): void
    {
    }

    /**
     * Sets maximum header size.
     *
     * @param string $max_size The maximum header size in bytes.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setmaxheaderssize.php
     */
    public function setMaxHeadersSize(string $max_size): void
    {
    }

    /**
     * Sets the retry limit for the connection.
     *
     * @param int $retries The retry limit. -1 means infinity.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.setretries.php
     */
    public function setRetries(int $retries): void
    {
    }

    /**
     * Sets the timeout for the connection/
     *
     * @param int $timeout Timeout in seconds.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttpconnection.settimeout.php
     */
    public function setTimeout(int $timeout): void
    {
    }
}
