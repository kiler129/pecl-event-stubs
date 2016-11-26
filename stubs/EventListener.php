<?php

final class EventListener
{
    /**
     * By default Libevent turns underlying file descriptors, or sockets, to non-blocking
     * mode. This flag tells to leave them non-blocking.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventlistener.php#eventlistener.constants.opt-leave-sockets-blocking
     */
    const OPT_LEAVE_SOCKETS_BLOCKING = 1;

    /**
     * If this option is set, the connection listener closes its underlying socket when
     * the EventListener object is freed.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventlistener.php#eventlistener.constants.opt-close-on-free
     */
    const OPT_CLOSE_ON_FREE = 2;

    /**
     * If this option is set, the connection listener sets the close-on-exec flag on the
     * underlying listener socket. See platform documentation for fcntl and FD_CLOEXEC
     * for more information.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventlistener.php#eventlistener.constants.opt-close-on-exec
     */
    const OPT_CLOSE_ON_EXEC = 4;

    /**
     * By default on some platforms, once a listener socket is closed, no other socket
     * can bind to the same port until a while has passed. Setting this option makes
     * Libevent mark the socket as reusable, so that once it is closed, another socket
     * can be opened to listen on the same port.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventlistener.php#eventlistener.constants.opt-reuseable
     */
    const OPT_REUSEABLE = 8;

    /**
     * Allocate locks for the listener, so that it’s safe to use it from multiple
     * threads.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventlistener.php#eventlistener.constants.opt-threadsafe
     */
    const OPT_THREADSAFE = 16;

    /**
     * Numeric file descriptor of the underlying socket.
     *
     * @var int
     * @link  http://php.net/manual/en/class.eventlistener.php#eventlistener.props.fd
     * @since 1.6.0
     */
    public $fd;


    /**
     * Creates new connection listener associated with an event base
     *
     * @param EventBase       $base    Associated event base.
     * @param callable        $cb      A callable that will be invoked when new
     *                                 connection received.
     * @param mixed           $data    Custom user data attached to cb.
     * @param int             $flags   Bit mask of EventListener::OPT_* constants.
     * @param int             $backlog Controls the maximum number of pending connections
     *                                 that the network stack should allow to wait in a
     *                                 not-yet-accepted state at any time; see
     *                                 documentation for your system’s listen function
     *                                 for more details. If backlog is negative, Libevent
     *                                 tries to pick a good value for the backlog ; if it
     *                                 is zero, Event assumes that listen is already
     *                                 called on the socket (target)
     * @param string|resource $target  May be string, socket resource, or a stream
     *                                 associated with a socket. In case if target is a
     *                                 string, the string will be parsed as network
     *                                 address. It will be interpreted as a UNIX domain
     *                                 socket path, if prefixed with 'unix:', e.g.
     *                                 'unix:/tmp/my.sock'.
     *
     * @link http://php.net/manual/en/eventlistener.construct.php
     */
    public function __construct(
        EventBase $base,
        callable $cb,
        mixed $data,
        int $flags,
        int $backlog,
        $target)
    {
    }

    /**
     * Disables an event connect listener object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventlistener.disable.php
     */
    public function disable(): bool
    {
    }

    /**
     * Enables an event connect listener object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventlistener.enable.php
     */
    public function enable(): bool
    {
    }

    /**
     * Returns event base associated with the event listener.
     *
     * @link http://php.net/manual/en/eventlistener.getbase.php
     */
    public function getBase(): void
    {
    }

    /**
     * Retrieves the current address to which the listener's socket is bound.
     *
     * @param string &$address Output parameter. IP-address depending on the socket
     *                         address family.
     * @param mixed  &$port    Output parameter. The port the socket is bound to.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventlistener.getsocketname.php
     */
    public static function getSocketName(string &$address, &$port = null): bool
    {
    }

    /**
     * Adjust event connect listener's callback and optionally the callback argument.
     *
     * @param callable   $cb  The new callback for new connections. Ignored if NULL.
     * @param mixed|null $arg Custom user data attached to the callback. Ignored if NULL.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventlistener.setcallback.php
     */
    public function setCallback(callable $cb, mixed $arg = null): void
    {
    }

    /**
     * Set event listener's error callback.
     *
     * @param callable $cb The error callback.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventlistener.seterrorcallback.php
     */
    public function setErrorCallback(callable $cb): void
    {
    }
}
