<?php

/**
 * EventBuffer represents Libevent's "evbuffer", an utility functionality for buffered
 * I/O.
 *
 * Event buffers are meant to be generally useful for doing the "buffer" part of buffered
 * network I/O.
 *
 * @link http://php.net/manual/en/class.eventbuffer.php
 */
class EventBuffer
{
    /**
     * The end of line is any sequence of any number of carriage return and linefeed
     * characters. This format is not very useful; it exists mainly for backward
     * compatibility.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.eol-any
     */
    const EOL_ANY = 0;

    /**
     * The end of the line is an optional carriage return, followed by a linefeed. (In
     * other words, it is either a "\r\n" or a "\n"). This format is useful in parsing
     * text-based Internet protocols, since the standards generally prescribe a "\r\n"
     * line-terminator, but nonconformant clients sometimes say just "\n".
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.eol-crlf
     */
    const EOL_CRLF = 1;

    /**
     * The end of a line is a single carriage return, followed by a single linefeed.
     * (This is also known as "\r\n". The ASCII values are 0x0D 0x0A).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.eol-crlf-strict
     */
    const EOL_CRLF_STRICT = 2;

    /**
     * The end of a line is a single linefeed character. (This is also known as "\n". It
     * is ASCII value is 0x0A).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.eol-lf
     */
    const EOL_LF = 3;

    /**
     * Flag used as argument of EventBuffer::setPosition() method. If this flag
     * specified, the position pointer is moved to an absolute position within the
     * buffer.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.ptr-set
     * @see  EventBuffer::setPosition()
     */
    const PTR_SET = 0;

    /**
     * The same as EventBuffer::PTR_SET, except this flag causes
     * EventBuffer::setPosition() method to move position forward up to the specified
     * number of bytes(instead of setting absolute position).
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbuffer.php#eventbuffer.constants.ptr-add
     * @see  EventBuffer::setPosition()
     */
    const PTR_ADD = 1;

    /**
     * The number of bytes stored in an event buffer.
     *
     * @var int
     */
    public $length;

    /**
     * The number of bytes stored contiguously at the front of the buffer. The bytes in a
     * buffer may be stored in multiple separate chunks of memory; the property returns
     * the number of bytes currently stored in the first chunk.
     *
     * @var int
     */
    public $contiguous_space;

    /**
     * Append data to the end of an event buffer.
     *
     * @param string $data String to be appended to the end of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.add.php
     */
    public function add(string $data): bool
    {
    }

    /**
     * Move all data from a buffer provided to the current instance of EventBuffer.
     *
     * Move all data from the buffer provided in buf parameter to the end of current
     * EventBuffer. This is a destructive add. The data from one buffer moves into the
     * other buffer. However, no unnecessary memory copies occur.
     *
     * @param EventBuffer $buf The source EventBuffer object.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.addbuffer.php
     */
    public function addBuffer(EventBuffer $buf): bool
    {
    }

    /**
     * Moves the specified number of bytes from a source buffer to the end of the current
     * buffer.
     *
     * Moves the specified number of bytes from a source buffer to the end of the current
     * buffer. If there are fewer number of bytes, it moves all the bytes available from
     * the source buffer.
     *
     * @param EventBuffer $buf Source buffer.
     * @param int         $len
     *
     * @return int Returns the number of bytes read.
     *
     * @link http://php.net/manual/en/eventbuffer.appendfrom.php
     */
    public function appendFrom(EventBuffer $buf, int $len): int
    {
    }

    /**
     * Constructs EventBuffer object.
     *
     * @link http://php.net/manual/en/eventbuffer.construct.php
     */
    public function __construct()
    {
    }

    /**
     * Copies out specified number of bytes from the front of the buffer.
     *
     * Behaves just like EventBuffer::read(), but does not drain any data from the
     * buffer. I.e. it copies the first max_bytes bytes from the front of the buffer into
     * data. If there are fewer than max_bytes bytes available, the function copies all
     * the bytes there are.
     *
     * @param string $data      Output string.
     * @param int    $max_bytes The number of bytes to copy.
     *
     * @return int Returns the number of bytes copied, or -1 on failure.
     *
     * @link http://php.net/manual/en/eventbuffer.copyout.php
     * @see  EventBuffer::read()
     */
    public function copyout(string &$data, int $max_bytes): int
    {
    }

    /**
     * Removes specified number of bytes from the front of the buffer without copying it
     * anywhere.
     *
     * Behaves as EventBuffer::read(), except that it does not copy the data: it just
     * removes it from the front of the buffer.
     *
     * @param int $len The number of bytes to remove from the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.drain.php
     * @see  EventBuffer::read()
     */
    public function drain(int $len): bool
    {
    }

    /**
     * Enables locking on buffer.
     *
     * Enable locking on an EventBuffer so that it can safely be used by multiple threads
     * at the same time. When locking is enabled, the lock will be held when callbacks
     * are invoked. This could result in deadlock if you aren't careful. Plan
     * accordingly!
     *
     * @link http://php.net/manual/en/eventbuffer.enablelocking.php
     */
    public function enableLocking(): void
    {
    }

    /**
     * Reserves space in buffer.
     *
     * Alters the last chunk of memory in the buffer, or adds a new chunk, such that the
     * buffer is now large enough to contain len bytes without any further allocations.
     *
     * @param int $len The number of bytes to reserve for the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.expand.php
     */
    public function expand(int $len): bool
    {
    }

    /**
     * Prevent calls that modify an event buffer from succeeding.
     *
     * @param bool $at_front Whether to disable changes to the front or end of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.freeze.php
     */
    public function freeze(bool $at_front): bool
    {
    }

    /**
     * Acquires a lock on buffer.
     *
     * Acquires a lock on buffer. Can be used in pair with EventBuffer::unlock() to make
     * a set of operations atomic, i.e. thread-safe. Note, it is not needed to lock
     * buffers for individual operations. When locking is enabled(see
     * EventBuffer::enableLocking() ), individual operations on event buffers are already
     * atomic.
     *
     * @link http://php.net/manual/en/eventbuffer.lock.php
     * @see  EventBuffer::unlock()
     * @see  EventBuffer::enableLocking()
     */
    public function lock(): void
    {
    }

    /**
     * Prepend data to the front of the buffer.
     *
     * @param string $data String to be prepended to the front of the buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.prepend.php
     */
    public function prepend(string $data): bool
    {
    }

    /**
     * Moves all data from source buffer to the front of current buffer.
     *
     * Behaves as EventBuffer::addBuffer(), except that it moves data to the front of the
     * buffer.
     *
     * @param EventBuffer $buf Source buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.prependbuffer.php
     * @see  EventBuffer::addBuffer()
     */
    public function prependBuffer(EventBuffer $buf): bool
    {
    }

    /**
     * Linearizes data within buffer and returns it's contents as a string.
     *
     * "Linearizes" the first size bytes of the buffer, copying or moving them as needed
     * to ensure that they are all contiguous and occupying the same chunk of memory. If
     * size is negative, the function linearizes the entire buffer.
     *
     * Warning: Calling EventBuffer::pullup() with a large size can be quite slow, since
     * it potentially needs to copy the entire buffer's contents.
     *
     * @param int $size The number of bytes required to be contiguous within the buffer.
     *
     * @return string If size is greater than the number of bytes in the buffer, the
     *                function returns NULL. Otherwise, EventBuffer::pullup() returns
     *                string.
     *
     * @link http://php.net/manual/en/eventbuffer.pullup.php
     */
    public function pullup(int $size): string
    {
    }

    /**
     * Read data from an evbuffer and drain the bytes read.
     *
     * Read the first max_bytes from the buffer and drain the bytes read. If more
     * max_bytes are requested than are available in the buffer, it only extracts as many
     * bytes as available.
     *
     * @param int $max_bytes Maxmimum number of bytes to read from the buffer.
     *
     * @return string Returns string read, or FALSE on failure.
     *
     * @link http://php.net/manual/en/eventbuffer.read.php
     */
    public function read(int $max_bytes): string
    {
    }

    /**
     * Extracts a line from the front of the buffer.
     *
     * Extracts a line from the front of the buffer and returns it in a newly allocated
     * string. If there is not a whole line to read, the function returns NULL. The line
     * terminator is not included in the copied string.
     *
     * @param int $eol_style One of EventBuffer:EOL_* constants.
     *
     * @return string On success returns the line read from the buffer, otherwise NULL.
     *
     * @link http://php.net/manual/en/eventbuffer.readline.php
     */
    public function readLine(int $eol_style): string
    {
    }

    /**
     * Scans the buffer for an occurrence of a string.
     *
     * Scans the buffer for an occurrence of the string what. It returns numeric position
     * of the string, or FALSE if the string was not found.
     *
     * If the start argument is provided, it points to the position at which the search
     * should begin; otherwise, the search is performed from the start of the string. If
     * end argument provided, the search is performed between start and end buffer
     * positions.
     *
     * @param string $what  String to search.
     * @param int    $start [optional] Start search position.
     * @param int    $end   [optional] End search position.
     *
     * @return int|bool Returns numeric position of the first occurrence of the string in
     *                  the buffer, or FALSE if string is not found.
     *
     * @link http://php.net/manual/en/eventbuffer.search.php
     */
    public function search(string $what, int $start = -1, int $end = -1)
    {
    }

    /**
     * Scans the buffer for an occurrence of an end of line.
     *
     * Scans the buffer for an occurrence of an end of line specified by eol_style
     * parameter. It returns numeric position of the string, or FALSE if the string was
     * not found.
     *
     * If the start argument is provided, it represents the position at which the search
     * should begin; otherwise, the search is performed from the start of the string. If
     * end argument provided, the search is performed between start and end buffer
     * positions.
     *
     * @param int $start     Start search position.
     * @param int $eol_style [optional] One of EventBuffer:EOL_* constants.
     *
     * @return int|bool Returns numeric position of the first occurrence of end-of-line
     *               symbol in the buffer, or FALSE if not found.
     *
     * @link http://php.net/manual/en/eventbuffer.searcheol.php
     */
    public function searchEol(
        int $start = -1,
        int $eol_style = EventBuffer::EOL_ANY)
    {
    }

    /**
     * Substracts a portion of the buffer data.
     *
     * Substracts up to length bytes of the buffer data beginning at start position.
     *
     * @param int $start  Returns the data substracted as a string on success, or FALSE
     *                    on failure.
     * @param int $length [optional] Maximum number of bytes to substract.
     *
     * @return string Returns the data substracted as a string on success, or FALSE on
     *                failure.
     *
     * @link http://php.net/manual/en/eventbuffer.substr.php
     */
    public function substr(int $start, int $length = null): string
    {
    }

    /**
     * Re-enable calls that modify an event buffer.
     *
     * @param bool $at_front Whether to enable events at the front or at the end of the
     *                       buffer.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.unfreeze.php
     */
    public function unfreeze(bool $at_front): bool
    {
    }

    /**
     * Releases lock acquired by EventBuffer::lock.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbuffer.unlock.php
     * @see  EventBuffer::lock()
     */
    public function unlock(): bool
    {
    }

    /**
     * Write contents of the buffer to a file or socket.
     *
     * Write contents of the buffer to a file descriptor. The buffer will be drained
     * after the bytes have been successfully written.
     *
     * @param resource|int $fd      Socket resource, stream or numeric file descriptor
     *                              associated normally associated with a socket.
     * @param int          $howmuch [optional] The maximum number of bytes to write.
     *
     * @return int Returns the number of bytes written, or FALSE on error.
     *
     * @link http://php.net/manual/en/eventbuffer.write.php
     */
    public function write($fd, int $howmuch = null): int
    {
    }
}
