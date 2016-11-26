<?php

/**
 * Represents an HTTP request.
 */
class EventHttpRequest
{
    /**
     * GET method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-get
     */
    const CMD_GET = 1;

    /**
     * POST method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-post
     */
    const CMD_POST = 2;

    /**
     * HEAD method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-head
     */
    const CMD_HEAD = 4;

    /**
     * PUT method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-put
     */
    const CMD_PUT = 8;

    /**
     * DELETE method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-delete
     */
    const CMD_DELETE = 16;

    /**
     * OPTIONS method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-options
     */
    const CMD_OPTIONS = 32;

    /**
     * TRACE method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-trace
     */
    const CMD_TRACE = 64;

    /**
     * CONNECT method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-connect
     */
    const CMD_CONNECT = 128;

    /**
     * PATCH method (command).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.cmd-patch
     */
    const CMD_PATCH = 256;

    /**
     * Request input header type.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.input-header
     */
    const INPUT_HEADER = 1;

    /**
     * Request output header type.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventhttprequest.php#eventhttprequest.constants.output-header
     */
    const OUTPUT_HEADER = 2;


    /**
     * Adds an HTTP header to the headers of the request.
     *
     * @param string $key   Header name.
     * @param string $value Header value.
     * @param int    $type  One of EventHttpRequest::*_HEADER constants.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventhttprequest.addheader.php
     */
    public function addHeader(string $key, string $value, int $type): bool
    {
    }

    /**
     * Cancels a pending HTTP request.
     *
     * Cancels an ongoing HTTP request. The callback associated with this request is not
     * executed and the request object is freed. If the request is currently being
     * processed, e.g. it is ongoing, the corresponding EventHttpConnection object is
     * going to get reset. A request cannot be canceled if its callback has executed
     * already. A request may be canceled reentrantly from its chunked callback.
     *
     * @link http://php.net/manual/en/eventhttprequest.cancel.php
     */
    public function cancel(): void
    {
    }

    /**
     * Removes all output headers from the header list of the request.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.clearheaders.php
     */
    public function clearHeaders(): void
    {
    }

    /**
     * Closes associated HTTP connection.
     *
     * @link http://php.net/manual/en/eventhttprequest.closeconnection.php
     */
    public function closeConnection(): void
    {
    }

    /**
     * Constructs EventHttpRequest object.
     *
     * @param callable   $callback Gets invoked on requesting path.
     * @param mixed|null $data     [optional] User custom data passed to the callback.
     *
     * @link http://php.net/manual/en/eventhttprequest.construct.php
     */
    public function __construct(callable $callback, mixed $data = null)
    {
    }

    /**
     * Finds the value belonging a header.
     *
     * @param string $key  The header name.
     * @param string $type One of EventHttpRequest::*_HEADER constants.
     *
     * @return mixed Returns NULL if header not found.
     *
     * @link http://php.net/manual/en/eventhttprequest.findheader.php
     */
    public function findHeader(string $key, string $type)
    {
    }

    /**
     * Frees the object and removes associated events.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.free.php
     */
    public function free(): void
    {
    }

    /**
     * Returns EventBufferEvent object.
     *
     * Returns EventBufferEvent object which represents buffer event that the connection
     * is using.
     *
     * Warning:
     * The reference counter of the returned object will be incremented by one to protect
     * internal structures against premature destruction when the method is called from a
     * user callback. So the EventBufferEvent object should be freed explicitly with
     * EventBufferEvent::free() method. Otherwise memory will leak.
     *
     * @return EventBufferEvent
     *
     * @link http://php.net/manual/en/eventhttprequest.getbufferevent.php
     */
    public function getBufferEvent(): EventBufferEvent
    {
    }

    /**
     * Returns the request command (method).
     *
     * Returns the request command, one of EventHttpRequest::CMD_* constants.
     *
     * @return int Returns the request command, one of EventHttpRequest::CMD_* constants.
     *
     * @link http://php.net/manual/en/eventhttprequest.getcommand.php
     */
    public function getCommand(): int
    {
    }

    /**
     * Returns EventHttpConnection object.
     *
     * Returns EventHttpConnection object which represents HTTP connection associated
     * with the request. EventHttpRequest::getConnection() method is usually useful when
     * we need to set up a callback on connection close. See
     * EventHttpConnection::setCloseCallback().
     *
     * Warning:
     * Libevent API allows HTTP request objects to be not bound to any HTTP connection.
     * Therefore we can't unambiguously associate EventHttpRequest with
     * EventHttpConnection. Thus, we construct EventHttpConnection object on-the-fly.
     * Having no information about the event base, DNS base and connection-close
     * callback, we just leave these fields unset.
     *
     * @return EventHttpConnection Returns EventHttpConnection object.
     *
     * @link http://php.net/manual/en/eventhttprequest.getconnection.php
     */
    public function getConnection(): EventHttpConnection
    {
    }

    /**
     * Returns the request host.
     *
     * @return string Returns the request host.
     *
     * @link http://php.net/manual/en/eventhttprequest.gethost.php
     */
    public function getHost(): string
    {
    }

    /**
     * Returns the input buffer.
     *
     * @return EventBuffer Returns the input buffer.
     *
     * @link http://php.net/manual/en/eventhttprequest.getinputbuffer.php
     */
    public function getInputBuffer(): EventBuffer
    {
    }

    /**
     * Returns associative array of the input headers.
     *
     * @return array Returns associative array of the input headers.
     *
     * @link http://php.net/manual/en/eventhttprequest.getinputheaders.php
     */
    public function getInputHeaders(): array
    {
    }

    /**
     * Returns the output buffer of the request.
     *
     * @return EventBuffer Returns the output buffer of the request.
     *
     * @link http://php.net/manual/en/eventhttprequest.getoutputbuffer.php
     */
    public function getOutputBuffer(): EventBuffer
    {
    }

    /**
     * Returns associative array of the output headers.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.getoutputheaders.php
     */
    public function getOutputHeaders(): void
    {
    }

    /**
     * Returns the response code.
     *
     * @return int Returns the response code of the request.
     *
     * @link http://php.net/manual/en/eventhttprequest.getresponsecode.php
     */
    public function getResponseCode(): int
    {
    }

    /**
     * Returns the request URI.
     *
     * @return string Returns the request URI
     *
     * @link http://php.net/manual/en/eventhttprequest.geturi.php
     */
    public function getUri(): string
    {
    }

    /**
     * Removes an HTTP header from the headers of the request.
     *
     * @param string $key  The header name.
     * @param string $type One of EventHttpRequest::*_HEADER constants.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.removeheader.php
     */
    public function removeHeader(string $key, string $type): void
    {
    }

    /**
     * Send an HTML error message to the client.
     *
     * @param int         $error  The HTTP error code.
     * @param string|null $reason [optional] A brief explanation of the error. If NULL,
     *                            the standard meaning of the error code will be used.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.senderror.php
     */
    public function sendError(int $error, string $reason = null): void
    {
    }

    /**
     * Send an HTML reply to the client.
     * Send an HTML reply to the client. The body of the reply consists of data in
     * optional buf parameter.
     *
     * @param int              $code   The HTTP response code to send.
     * @param string           $reason A brief message to send with the response code.
     * @param EventBuffer|null $buf    [optional] The body of the response.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.sendreply.php
     */
    public function sendReply(int $code, string $reason, EventBuffer $buf = null): void
    {
    }

    /**
     * Send another data chunk as part of an ongoing chunked reply.
     *
     * Send another data chunk as part of an ongoing chunked reply. After calling this
     * method buf will be empty.
     *
     * @param EventBuffer $buf The data chunk to send as part of the reply.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.sendreplychunk.php
     */
    public function sendReplyChunk(EventBuffer $buf): void
    {
    }

    /**
     * Complete a chunked reply, freeing the request as appropriate.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.sendreplyend.php
     */
    public function sendReplyEnd(): void
    {
    }

    /**
     * Initiate a chunked reply.
     *
     * Initiate a reply that uses Transfer-Encoding chunked.
     * This allows the caller to stream the reply back to the client and is useful when
     * either not all of the reply data is immediately available or when sending very
     * large replies. The caller needs to supply data chunks with
     * EventHttpRequest::sendReplyChunk() and complete the reply by calling
     * EventHttpRequest::sendReplyEnd().
     *
     * @param int    $code   The HTTP response code to send.
     * @param string $reason A brief message to send with the response code.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventhttprequest.sendreplystart.php
     * @see  EventHttpRequest::sendReplyChunk()
     * @see  EventHttpRequest::sendReplyEnd()
     */
    public function sendReplyStart(int $code, string $reason): void
    {
    }
}
