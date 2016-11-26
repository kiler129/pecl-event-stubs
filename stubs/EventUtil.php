<?php

/**
 * EventUtil is a singleton with supplementary methods and constants.
 */
final class EventUtil
{

    /**
     * IPv4 address family.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventutil.php#eventutil.constants.af-inet
     */
    const AF_INET = 2;

    /**
     * IPv6 address family.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventutil.php#eventutil.constants.af-inet6
     */
    const AF_INET6 = 10;

    /**
     * Unspecified IP address family.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventutil.php#eventutil.constants.af-unspec
     */
    const AF_UNSPEC = 0;

    /**
     * Libevent' version number at the time when Event extension had been compiled with
     * the library.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventutil.php#eventutil.constants.libevent-version-number
     */
    const LIBEVENT_VERSION_NUMBER = 33559808;

    /**
     * Socket option. Enable socket debugging. Only allowed for processes with the
     * CAP_NET_ADMIN capability or an effective user ID of 0.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-debug
     * @since 1.6.0
     */
    const SO_DEBUG = 1;

    /**
     * Socket option. Indicates that the rules used in validating addresses supplied in a
     * bind(2) call should allow reuse of local addresses. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-reuseaddr
     * @since 1.6.0
     */
    const SO_REUSEADDR = 2;

    /**
     * Socket option. Enable sending of keep-alive messages on connection-oriented
     * sockets. Expects an integer boolean flag. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-keepalive
     * @since 1.6.0
     */
    const SO_KEEPALIVE = 9;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-dontroute
     * @since 1.6.0
     */
    const SO_DONTROUTE = 5;

    /**
     * Socket option. When enabled, a close(2) or shutdown(2) will not return until all
     * queued messages for the socket have been successfully sent or the linger timeout
     * has been reached. Otherwise, the call returns immediately and the closing is done
     * in the background. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-linger
     * @since 1.6.0
     */
    const SO_LINGER = 13;

    /**
     * Socket option. Reports whether transmission of broadcast messages is supported.
     * See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-broadcast
     * @since 1.6.0
     */
    const SO_BROADCAST = 6;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-oobinline
     * @since 1.6.0
     */
    const SO_OOBINLINE = 10;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-sndbuf
     * @since 1.6.0
     */
    const SO_SNDBUF = 7;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-rcvbuf
     * @since 1.6.0
     */
    const SO_RCVBUF = 8;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-sndlowat
     * @since 1.6.0
     */
    const SO_SNDLOWAT = 19;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-rcvlowat
     * @since 1.6.0
     */
    const SO_RCVLOWAT = 18;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-sndtimeo
     * @since 1.6.0
     */
    const SO_SNDTIMEO = 21;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-rcvtimeo
     * @since 1.6.0
     */
    const SO_RCVTIMEO = 20;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-type
     * @since 1.6.0
     */
    const SO_TYPE = 3;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.so-error
     * @since 1.6.0
     */
    const SO_ERROR = 4;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.sol-socket
     * @since 1.6.0
     */
    const SOL_SOCKET = 1;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.sol-tcp
     * @since 1.6.0
     */
    const SOL_TCP = 6;

    /**
     * Socket option. See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.sol-udp
     * @since 1.6.0
     */
    const SOL_UDP = 17;

    /**
     * See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.ipproto-ip
     * @since 1.6.0
     */
    const IPPROTO_IP = 0;

    /**
     * See the socket(7) manual page.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventutil.php#eventutil.constants.ipproto-ipv6
     * @since 1.6.0
     */
    const IPPROTO_IPV6 = 41;

    /**
     * The abstract constructor
     *
     * EventUtil is a singleton. Therefore the constructor is abstract, and it is
     * impossible to create objects based on this class.
     *
     * @link http://php.net/manual/en/eventutil.construct.php
     */
    /*abstract*/
    public function __construct()
    {
    }
    //Note: To comply with PHP syntax this constructor is not marked with abstract in stub

    /**
     * Returns the most recent socket error number.
     *
     * @param resource|null $socket [optional] Socket resource, stream or a file
     *                              descriptor of a socket.
     *
     * @return int Returns the most recent socket error number (errno).
     *
     * @link http://php.net/manual/en/eventutil.getlastsocketerrno.php
     */
    public static function getLastSocketErrno($socket = null): int
    {
    }

    /**
     * Returns the most recent socket error.
     *
     * @param resource|null $socket [optional] Socket resource, stream or a file
     *                              descriptor of a socket.
     *
     * @return string Returns the most recent socket error.
     *
     * @link http://php.net/manual/en/eventutil.getlastsocketerror.php
     */
    public static function getLastSocketError($socket = null): string
    {
    }

    /**
     * Returns numeric file descriptor of a socket, or stream.
     *
     * Returns numeric file descriptor of a socket or stream specified by socket argument
     * just like the Event extension does it internally for all methods accepting socket
     * resource or stream.
     *
     * @param resource $socket Socket resource or stream.
     *
     * @return int|bool Returns socket fd # on success. Otherwise FALSE.
     *                  EventUtil::getSocketFd() returns FALSE in case if it is whether
     *                  failed to recognize the type of the underlying file, or detected
     *                  that the file descriptor associated with socket is not valid.
     *
     * @link http://php.net/manual/en/eventutil.getsocketfd.php
     */
    public static function getSocketFd(resource $socket)
    {
    }

    /**
     * Retrieves the current address to which the socket is bound.
     *
     * @param resource|int $socket   Socket resource, stream or a file descriptor of a
     *                               socket.
     * @param string       &$address Output parameter. IP-address, or the UNIX domain
     *                               socket path depending on the socket address family.
     * @param int|null     &$port    [optional] Output parameter. The port the socket is
     *                               bound to. Has no meaning for UNIX domain sockets.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventutil.getsocketname.php
     */
    public static function getSocketName($socket, string &$address, &$port = null): bool
    {
    }

    /**
     * Sets socket options.
     *
     * @param resource|int $socket  Socket resource, stream, or numeric file descriptor
     *                              associated with the socket.
     * @param int          $level   One of EventUtil::SOL_* constants. Specifies the
     *                              protocol level at which the option resides. For
     *                              example, to retrieve options at the socket level, a
     *                              level parameter of EventUtil::SOL_SOCKET would be
     *                              used. Other levels, such as TCP, can be used by
     *                              specifying the protocol number of that level.
     *                              Protocol numbers can be found by using the
     *                              getprotobyname() function.
     * @param int          $optname Option name (type). Has the same meaning as
     *                              corresponding parameter of socket_get_option()
     *                              function.
     * @param mixed        $optval  Accepts the same values as optval parameter of the
     *                              socket_get_option() function.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @see  socket_get_option()
     * @link http://php.net/manual/en/eventutil.setsocketoption.php
     */
    public static function setSocketOption(
        $socket,
        int $level,
        int $optname,
        $optval): bool
    {
    }

    /**
     * Generates entropy by means of OpenSSL's RAND_poll().
     *
     * See the system manual for more details.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventutil.sslrandpoll.php
     */
    public static function sslRandPoll(): void
    {
    }
}
