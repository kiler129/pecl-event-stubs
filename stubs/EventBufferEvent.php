<?php

/**
 * Represents Libevent's buffer event.
 *
 * Usually an application wants to perform some amount of data buffering in addition to
 * just responding to events. When we want to write data, for example, the usual pattern
 * looks like:
 * 1. Decide that we want to write some data to a connection; put that data in a buffer.
 * 2. Wait for the connection to become writable
 * 3. Write as much of the data as we can
 * 4. Remember how much we wrote, and if we still have more data to write, wait for the
 *    connection to become writable again.
 *
 * This buffered I/O pattern is common enough that Libevent provides a generic mechanism
 * for it. A "buffer event" consists of an underlying transport (like a socket), a read
 * buffer, and a write buffer. Instead of regular events, which give callbacks when the
 * underlying transport is ready to be read or written, a buffer event invokes its
 * user-supplied callbacks when it has read or written enough data.
 */
final class EventBufferEvent
{
    /**
     * An event occurred during a read operation on the buffer event. See the other flags
     * for which event it was.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.reading
     */
    const READING = 1;

    /**
     * An event occurred during a read operation on the buffer event. See the other flags
     * for which event it was.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.writing
     */
    const WRITING = 2;

    /**
     * Got an end-of-file indication on the buffer event.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.eof
     */
    const EOF = 16;

    /**
     * An error occurred during a bufferevent operation. For more information on what the
     * error was, call EventUtil::getLastSocketErrno() and/or
     * EventUtil::getLastSocketError().
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.error
     * @see  EventUtil::getLastSocketErrno()
     * @see  EventUtil::getLastSocketError()
     */
    const ERROR = 32;

    /**
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.timeout
     */
    const TIMEOUT = 64;

    /**
     * Finished a requested connection on the buffer event.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.connected
     */
    const CONNECTED = 128;

    /**
     * When the buffer event is freed, close the underlying transport. This will close an
     * underlying socket, free an underlying buffer event, etc.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.opt-close-on-free
     */
    const OPT_CLOSE_ON_FREE = 1;

    /**
     * Automatically allocate locks for the buffer event, so that it’s safe to use from
     * multiple threads.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.threadsafe
     */
    const OPT_THREADSAFE = 2;

    /**
     * When this flag is set, the buffer event defers all of its callbacks.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.opt-defer-callbacks
     * @see  http://www.wangafu.net/~nickm/libevent-book/Ref6_bufferevent.html#_deferred_callbacks
     */
    const OPT_DEFER_CALLBACKS = 4;

    /**
     * By default, when the buffer event is set up to be thread-safe, the buffer event’s
     * locks are held whenever the any user-provided callback is invoked. Setting this
     * option makes Libevent release the buffer event’s lock when it’s invoking the
     * callbacks.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.opt-unlock-callbacks
     */
    const OPT_UNLOCK_CALLBACKS = 8;

    /**
     * The SSL handshake is done.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.ssl-open
     */
    const SSL_OPEN = 0;

    /**
     * SSL is currently performing negotiation as a client.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.ssl-connecting
     */
    const SSL_CONNECTING = 1;

    /**
     * SSL is currently performing negotiation as a server.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.constants.ssl-accepting
     */
    const SSL_ACCEPTING = 2;

    /**
     * Numeric file descriptor associated with the buffer event. Normally represents a
     * bound socket. Equals to NULL, if there is no file descriptor(socket) associated
     * with the buffer event.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.props.fd
     */
    public $fd;

    /**
     * The priority of the events used to implement the buffer event.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.props.priority
     */
    public $priority;

    /**
     * Underlying input buffer object.
     *
     * @var EventBuffer
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.props.input
     */
    public $input;

    /**
     * Underlying output buffer object.
     *
     * @var EventBuffer
     * @link http://php.net/manual/en/class.eventbufferevent.php#eventbufferevent.props.output
     */
    public $output;

    /**
     * Closes file descriptor associated with the current buffer event.
     *
     * Closes file descriptor associated with the current buffer event.
     * This method may be used in cases when the EventBufferEvent::OPT_CLOSE_ON_FREE
     * option is not appropriate.
     *
     * @link http://php.net/manual/en/eventbufferevent.close.php
     */
    public function close(): void
    {
    }

    /**
     * Connect buffer event's file descriptor to given address or UNIX socket.
     *
     * Connect buffer event's file descriptor to given address(optionally with port), or
     * a UNIX domain socket.
     *
     * If socket is not assigned to the buffer event, this function allocates a new
     * socket and makes it non-blocking internally.
     *
     * To resolve DNS names(asyncronously), use EventBufferEvent::connectHost() method.
     *
     * @param string $addr  Should contain an IP address with optional port number, or a
     *                      path to UNIX domain socket. Recognized formats are:
     *                      - [IPv6Address]:port
     *                      - [IPv6Address]
     *                      - IPv6Address
     *                      - IPv4Address:port
     *                      - IPv4Address
     *                      - unix:path (Note: 'unix:' prefix is **currently** not case
     *                      sensitive)
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.connect.php
     */
    public function connect(string $addr): bool
    {
    }

    /**
     * Connects to a hostname with optionally asynchronous DNS resolving.
     *
     * Resolves the DNS name hostname, looking for addresses of type family
     * (EventUtil::AF_* constants). If the name resolution fails, it invokes the event
     * callback with an error event. If it succeeds, it launches a connection attempt
     * just as EventBufferEvent::connect() would.
     *
     * Note:
     * EventDnsBase is available only if Event configured --with-event-extra (event_extra
     * library, libevent protocol-specific functionality support including HTTP, DNS, and
     * RPC). Additionally EventBufferEvent::connectHost() requires libevent-2.0.3-alpha
     * or greater.
     *
     * @param EventDnsBase|null $dns_base  Null or an object created with
     *                                     EventDnsBase::__construct(). For asynchronous
     *                                     hostname resolving pass a valid event dns base
     *                                     resource. Otherwise the hostname resolving
     *                                     will
     *                                     block.
     * @param string            $hostname  Hostname to connect to.
     *                                     Recognized formats are:
     *                                     - www.example.com (hostname)
     *                                     - 1.2.3.4 (ipv4address)
     *                                     - ::1 (ipv6address)
     *                                     - [::1] ([ipv6address])
     * @param int               $port      Port number.
     * @param int               $family    [optional] Address family.
     *                                     EventUtil::AF_UNSPEC, EventUtil::AF_INET, or
     *                                     EventUtil::AF_INET6.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.connecthost.php
     * @see  EventBufferEvent::connect()
     */
    public function connectHost(
        EventDnsBase $dns_base,
        string $hostname,
        int $port,
        int $family = EventUtil::AF_UNSPEC): bool
    {
    }

    /**
     * Constructs EventBufferEvent object.
     *
     * @param EventBase     $base    Event base that should be associated with the new
     *                               buffer event.
     * @param mixed         $socket  [optional] May be created as a stream (not
     *                               necessarily by means of sockets extension)
     * @param int           $options [optional] One of EventBufferEvent::OPT_* constants,
     *                               or 0.
     * @param callable|null $readcb  [optional] Read event callback.
     * @param callable|null $writecb [optional] Write event callback.
     * @param callable|null $eventcb [optional] Status-change event callback.
     *
     * @link http://php.net/manual/en/eventbufferevent.construct.php
     * @see  http://php.net/manual/en/eventbufferevent.about.callbacks.php
     */
    public function __construct(
        EventBase $base,
        $socket = null,
        int $options = 0,
        callable $readcb = null,
        callable $writecb = null,
        callable $eventcb = null)
    {
    }

    /**
     * Creates two buffer events connected to each other.
     *
     * Returns array of two EventBufferEvent objects connected to each other. All the
     * usual options are supported, except for EventBufferEvent::OPT_CLOSE_ON_FREE,
     * which has no effect, and EventBufferEvent::OPT_DEFER_CALLBACKS, which is always
     * on.
     *
     * @param EventBase $base    Associated event base.
     * @param int       $options [optional] EventBufferEvent::OPT_* constants combined
     *                           with bitwise OR operator.
     *
     * @return EventBufferEvent[] Returns array of two EventBufferEvent objects connected
     *                            to each other.
     *
     * @link http://php.net/manual/en/eventbufferevent.createpair.php
     */
    public static function createPair(EventBase $base, int $options = 0): array
    {
    }

    /**
     * Disable events read, write, or both on a buffer event.
     *
     * Disable events Event::READ, Event::WRITE, or Event::READ | Event::WRITE on a
     * buffer event.
     *
     * @param int $events
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.disable.php
     */
    public function disable(int $events): bool
    {
    }

    /**
     * Enable events read, write, or both on a buffer event.
     *
     * Enable events Event::READ, Event::WRITE, or Event::READ | Event::WRITE on a
     * buffer event.
     *
     * @param int $events Event::READ, Event::WRITE, or Event::READ | Event::WRITE on a
     *                    buffer event.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.enable.php
     */
    public function enable(int $events): bool
    {
    }

    /**
     * Free a buffer event.
     *
     * Free resources allocated by buffer event.
     * Usually there is no need to call this method, since normally it is done within
     * internal object destructors. However, sometimes we have a long-time script
     * allocating lots of instances, or a script with a heavy memory usage, where we need
     * to free resources as soon as possible. In such cases EventBufferEvent::free() may
     * be used to protect the script against running up to the memory_limit.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbufferevent.free.php
     */
    public function free(): void
    {
    }

    /**
     * Returns string describing the last failed DNS lookup attempt.
     *
     * Returns string describing the last failed DNS lookup attempt made by
     * EventBufferEvent::connectHost(), or an empty string, if there is no DNS error
     * detected.
     *
     * @return string Returns a string describing DNS lookup error, or an empty string
     *                for no error.
     *
     * @link http://php.net/manual/en/eventbufferevent.getdnserrorstring.php
     * @see  EventBufferEvent::connectHost()
     */
    public function getDnsErrorString(): string
    {
    }

    /**
     * Returns bitmask of events currently enabled on the buffer event.
     *
     * @return int Returns integer representing a bitmask of events currently enabled on
     *             the buffer event.
     *
     * @link http://php.net/manual/en/eventbufferevent.getenabled.php
     */
    public function getEnabled(): int
    {
    }

    /**
     * Returns underlying input buffer associated with current buffer event.
     *
     * Returns underlying input buffer associated with current buffer event. An input
     * buffer is a storage for data to read. Note, there is also input property of
     * EventBufferEvent class.
     *
     * @return EventBuffer Returns instance of EventBuffer input buffer associated with
     *                     current buffer event.
     *
     * @link http://php.net/manual/en/eventbufferevent.getinput.php
     */
    public function getInput(): EventBuffer
    {
    }

    /**
     * Returns underlying output buffer associated with current buffer event.
     *
     * Returns underlying output buffer associated with current buffer event. An output
     * buffer is a storage for data to be written. Note, there is also output property of
     * EventBufferEvent class.
     *
     * @return EventBuffer Returns instance of EventBuffer output buffer associated with
     *                     current buffer event.
     *
     * @link http://php.net/manual/en/eventbufferevent.getoutput.php
     */
    public function getOutput(): EventBuffer
    {
    }

    /**
     * Read buffer's data.
     *
     * Removes up to size bytes from the input buffer. Returns a string of data read from
     * the input buffer.
     *
     * @param int $size Maximum number of bytes to read.
     *
     * @return string Returns string of data read from the input buffer.
     *
     * @link http://php.net/manual/en/eventbufferevent.read.php
     */
    public function read(int $size): string
    {
    }

    /**
     * Drains the entire contents of the input buffer and places them into $buf.
     *
     * @param EventBuffer $buf Target buffer.
     *
     * @return bool Returns TRUE on success; Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.readbuffer.php
     */
    public function readBuffer(EventBuffer $buf): bool
    {
    }

    /**
     * Assigns read, write and event (status) callbacks.
     *
     * @param callable    $readcb  Read event callback.
     * @param callable    $writecb Write event callback.
     * @param callable    $eventcb Status-change event callback.
     * @param string|null $arg     [optional] A variable that will be passed to all the
     *                             callbacks.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbufferevent.setcallbacks.php
     * @see  http://php.net/manual/en/eventbufferevent.about.callbacks.php
     */
    public function setCallbacks(
        callable $readcb,
        callable $writecb,
        callable $eventcb,
        string $arg = null): void
    {
    }

    /**
     * Assign a priority to a buffer event.
     *
     * Warning: Only supported for socket buffer events.
     *
     * @param int $priority Priority value.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.setpriority.php
     */
    public function setPriority(int $priority): bool
    {
    }

    /**
     * Set the read and write timeout for a buffer event.
     *
     * @param float $timeout_read  Read timeout.
     * @param float $timeout_write Write timeout.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.settimeouts.php
     */
    public function setTimeouts(float $timeout_read, float $timeout_write): bool
    {
    }

    /**
     * Adjusts read and/or write watermarks.
     *
     * Adjusts the read watermarks, the write watermarks, or both, of a single buffer
     * event.
     *
     * A buffer event watermark is an edge, a value specifying number of bytes to be read
     * or written before callback is invoked. By default every read/write event triggers
     * a callback invokation
     *
     * @param int $events   Bitmask of Event::READ, Event::WRITE, or both.
     * @param int $lowmark  Minimum watermark value.
     * @param int $highmark Maximum watermark value. 0 means "unlimited".
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbufferevent.setwatermark.php
     * @see  http://www.wangafu.net/~nickm/libevent-book/Ref6_bufferevent.html#_callbacks_and_watermarks
     */
    public function setWatermark(int $events, int $lowmark, int $highmark): void
    {
    }

    /**
     * Returns most recent OpenSSL error reported on the buffer event.
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @return string Returns OpenSSL error string reported on the buffer event, or
     *                FALSE, if there is no more error to return.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslerror.php
     */
    public function sslError(): string
    {
    }

    /**
     * Create a new SSL buffer event to send its data over another buffer event.
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @param EventBase        $base       Associated event base.
     * @param EventBufferEvent $underlying A socket buffer event to use for this SSL.
     * @param EventSslContext  $ctx        Object of EventSslContext class.
     * @param int              $state      The current state of SSL connection:
     *                                     EventBufferEvent::SSL_OPEN,
     *                                     EventBufferEvent::SSL_ACCEPTING or
     *                                     EventBufferEvent::SSL_CONNECTING.
     * @param int              $options    [optional] One or more buffer event options.
     *
     * @return EventBufferEvent Returns a new SSL EventBufferEvent object.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslfilter.php
     */
    public static function sslFilter(
        EventBase $base,
        EventBufferEvent $underlying,
        EventSslContext $ctx,
        int $state,
        int $options = 0): EventBufferEvent
    {
    }

    /**
     * Returns a textual description of the cipher.
     *
     * Retrieves description of the current cipher by means of the SSL_CIPHER_description
     * SSL API function (see SSL_CIPHER_get_name(3) man page).
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @return string|bool Returns a textual description of the cipher on success, or
     *                     FALSE on error.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslgetcipherinfo.php
     */
    public function sslGetCipherInfo()
    {
    }

    /**
     * Returns the current cipher name of the SSL connection.
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @return string|bool Returns the current cipher name of the SSL connection, or
     *                     FALSE on error.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslgetciphername.php
     */
    public function sslGetCipherName()
    {
    }

    /**
     * Returns version of cipher used by current SSL connection.
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @return string|bool Returns the current cipher version of the SSL connection, or
     *                     FALSE on error.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslgetcipherversion.php
     */
    public function sslGetCipherVersion()
    {
    }

    /**
     * Returns the name of the protocol used for current SSL connection.
     *
     * Note:
     * This function is available only if Event is compiled with OpenSSL support.
     *
     * @return string Returns the name of the protocol used for current SSL connection.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslgetprotocol.php
     */
    public function sslGetProtocol(): string
    {
    }

    /**
     * Tells a buffer event to begin SSL renegotiation.
     *
     * Warning:
     * Calling this function tells the SSL to renegotiate, and the buffer event to invoke
     * appropriate callbacks. This is an advanced topic; this should be generally avoided
     * unless one really knows what he/she does, especially since many SSL versions have
     * had known security issues related to renegotiation.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbufferevent.sslrenegotiate.php
     */
    public function sslRenegotiate(): void
    {
    }

    /**
     * Creates a new SSL buffer event to send its data over an SSL on a socket.
     *
     * @param EventBase         $base          Associated event base.
     * @param int|null|resource $socket        Socket to use for this SSL. Can be stream
     *                                         or socket resource, numeric file
     *                                         descriptor, or NULL. If socket is NULL, it
     *                                         is assumed that the file descriptor for
     *                                         the socket will be assigned later, for
     *                                         instance, by means of
     *                                         EventBufferEvent::connectHost() method.
     * @param EventSslContext   $ctx           Object of EventSslContext class.
     * @param int               $state         The current state of SSL connection:
     *                                         EventBufferEvent::SSL_OPEN,
     *                                         EventBufferEvent::SSL_ACCEPTING or
     *                                         EventBufferEvent::SSL_CONNECTING.
     * @param int               $options       [optional] The buffer event options.
     *
     * @return EventBufferEvent Returns EventBufferEvent object.
     *
     * @link http://php.net/manual/en/eventbufferevent.sslsocket.php
     * @see  EventBufferEvent::connectHost()
     */
    public static function sslSocket(
        EventBase $base,
        $socket,
        EventSslContext $ctx,
        int $state,
        int $options = 0): EventBufferEvent
    {
    }

    /**
     * Adds data to a buffer event's output buffer.
     *
     * @param string $data Data to be added to the underlying buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.write.php
     */
    public function write(string $data): bool
    {
    }

    /**
     * Adds contents of the entire buffer to a buffer event's output buffer.
     *
     * @param EventBuffer $buf Source EventBuffer object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbufferevent.writebuffer.php
     */
    public function writeBuffer(EventBuffer $buf): bool
    {
    }

}
