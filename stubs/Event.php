<?php

/**
 * Event class represents and event firing on a file descriptor being ready to read from
 * or write to; a file descriptor becoming ready to read from or write to(edge-triggered
 * I/O only); a timeout expiring; a signal occurring; a user-triggered event.
 *
 * Every event is associated with EventBase. However, event will never fire until it is
 * added (via Event::add() ). An added event remains in pending state until the
 * registered event occurs, thus turning it to active state. To handle events user may
 * register a callback which is called when event becomes active. If event is configured
 * persistent, it remains pending. If it is not persistent, it stops being pending when
 * it's callback runs. Event::del() method deletes event, thus making it non-pending. By
 * means of Event::add() method it could be added again.
 *
 * @link http://php.net/manual/en/class.event.php
 */
final class Event
{
    /**
     * Indicates that the event should be edge-triggered, if the underlying event base
     * backend supports edge-triggered events. This affects the semantics of Event::READ
     * and Event::WRITE.
     *
     * @var int
     */
    const ET = 32;

    /**
     * Indicates that the event is persistent.
     *
     * @var int
     * @see http://php.net/manual/en/event.persistence.php
     */
    const PERSIST = 16;

    /**
     * This flag indicates an event that becomes active when the provided file
     * descriptor(usually a stream resource, or socket) is ready for reading.
     *
     * @var int
     */
    const READ = 2;

    /**
     * This flag indicates an event that becomes active when the provided file
     * descriptor(usually a stream resource, or socket) is ready for reading.
     *
     * @var int
     */
    const WRITE = 4;

    /**
     * Used to implement signal detection. See "Constructing signal events" below.
     *
     * @var int
     */
    const SIGNAL = 8;

    /**
     * This flag indicates an event that becomes active after a timeout elapses.
     *
     * The Event::TIMEOUT flag is ignored when constructing an event: one can either set
     * a timeout when event is added, or not. It is set in the $what argument to the
     * callback function when a timeout has occurred.
     *
     * @var int
     */
    const TIMEOUT = 1;

    /**
     * Whether event is pending.
     *
     * @var bool
     * @see http://php.net/manual/en/event.persistence.php
     */
    public $pending;

    /**
     * Makes event pending.
     *
     * Marks event pending. Non-pending event will never occur, and the event callback
     * will never be called. In conjuction with Event::del() an event could be
     * re-scheduled by user at any time. If Event::add() is called on an already pending
     * event, libevent will leave it pending and re-schedule it with the given timeout(if
     * specified). If in this case timeout is not specified, Event::add() has no effect.
     *
     * @param double $timeout [optional] Timeout in seconds.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.add.php
     */
    public function add(double $timeout = null): bool
    {
    }


    /**
     * Makes signal event pending.
     *
     * Event::addSignal() is an alias of Event::add()
     *
     * @param double $timeout [optional] Timeout in seconds.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.addsignal.php
     * @see  \Event::add()
     */
    public function addSignal(double $timeout = null): bool
    {
    }

    /**
     * Makes signal event pending.
     *
     * Event::addTimer() is an alias of Event::add()
     *
     * @param double $timeout [optional] Timeout in seconds.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.addtimer.php
     * @see  Event::add()
     */
    public function addTimer(double $timeout = null): bool
    {
    }

    /**
     * Constructs Event object.
     *
     * @param EventBase $base The event base to associate with.
     * @param mixed     $fd   A stream resource, socket resource, or numeric file
     *                        descriptor. For timer events pass -1. For signal events
     *                        pass the signal number, e.g. SIGHUP.
     * @param int       $what Event flags.
     * @param callable  $cb   The event callback. {@see
     *                        http://php.net/manual/en/event.callbacks.php}
     * @param mixed     $arg  [optional] Custom data. If specified, it will be passed to
     *                        the callback when event triggers.
     *
     * @link http://php.net/manual/en/event.construct.php
     */
    public function __construct(
        EventBase $base,
        mixed $fd,
        int $what,
        callable $cb,
        mixed $arg = null)
    {
    }

    /**
     * Makes event non-pending.
     *
     * Removes an event from the set of monitored events, i.e. makes it non-pending.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.del.php
     */
    public function del(): bool
    {
    }

    /**
     * Makes event non-pending.
     *
     * Event::delSignal() is an alias of Event::del().
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.delsignal.php
     * @see  Event::del()
     */
    public function delSignal(): bool
    {
    }

    /**
     * Makes event non-pending.
     *
     * Event::delTimer() is an alias of Event::del().
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.deltimer.php
     * @see  Event::del()
     */
    public function delTimer(): bool
    {
    }

    /**
     * Make event non-pending and free resources allocated for this event.
     *
     * Removes event from the list of events monitored by libevent, and free resources
     * allocated for the event. Warning: The Event::free() method currently doesn't
     * destruct the object itself. To destruct the object completely call unset(), or
     * assign NULL.
     *
     * @return void
     *
     * @link http://php.net/manual/en/event.free.php
     */
    public function free(): void
    {
    }

    /**
     * Returns array with of the names of the methods supported in this version of
     * Libevent.
     *
     * @return array
     *
     * @link http://php.net/manual/en/event.getsupportedmethods.php
     */
    public static function getSupportedMethods(): array
    {
    }

    /**
     * Detects whether event is pending or scheduled.
     *
     * @param int $flags One of, or a composition of the following constants:
     *                   Event::READ, Event::WRITE, Event::TIMEOUT, Event::SIGNAL.
     *
     * @return bool Returns TRUE if event is pending or scheduled. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.pending.php
     */
    public function pending(int $flags): bool
    {
    }

    /**
     * Re-configures event.
     *
     * Re-configures event. Note, this function doesn't invoke obsolete libevent's
     * event_set. It calls event_assign instead.
     *
     * @param EventBase $base The event base to associate the event with.
     * @param mixed     $fd   A stream, socket resource, or numeric file descriptor; for
     *                        signal events pass -1.
     * @param int       $what [optional] Even flags.
     * @param callable  $cb   [optional] The event callback. {@see
     *                        http://php.net/manual/en/event.callbacks.php}
     * @param mixed     $arg  [optional] Custom data associated with the event. It will
     *                        be passed to the callback when the event becomes active.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.set.php
     */
    public function set(
        EventBase $base,
        mixed $fd,
        int $what = null,
        callable $cb = null,
        mixed $arg = null): bool
    {
    }

    /**
     * Set event priority.
     *
     * @param int $priority The event priority.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.setpriority.php
     */
    public function setPriority(int $priority): bool
    {
    }

    /**
     * Re-configures timer event.
     *
     * Re-configures timer event. Note, this function doesn't invoke obsolete libevent's
     * event_set. It calls event_assign instead.
     *
     * @param EventBase $base The event base to associate with.
     * @param callable  $cb   The event callback. {@see
     *                        http://php.net/manual/en/event.callbacks.php}
     * @param mixed     $arg  [optional] Custom data. If specified, it will be passed to
     *                        the callback when event triggers.
     *
     * @return bool
     *
     * @link http://php.net/manual/en/event.settimer.php
     */
    public function setTimer(EventBase $base, callable $cb, mixed $arg = null): bool
    {
    }

    /**
     * Constructs signal event object.
     *
     * Constructs signal event object. This is a straightforward method to create a
     * signal event. Note, the generic Event::__construct() method can construct signal
     * event objects too.
     *
     * @param EventBase $base   The associated event base object.
     * @param int       $signum The signal number.
     * @param callable  $cb     The event callback. {@see
     *                          http://php.net/manual/en/event.callbacks.php}
     * @param mixed     $arg    Custom data. If specified, it will be passed to the
     *                          callback when event triggers.
     *
     * @return Event Returns Event object on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.signal.php
     */
    public static function signal(
        EventBase $base,
        int $signum,
        callable $cb,
        mixed $arg = null): Event
    {
    }


    /**
     * Constructs timer event object.
     *
     * Constructs timer event object. This is a straightforward method to create a timer
     * event. Note, the generic Event::__construct() method can construct signal event
     * objects too.
     *
     * @param EventBase $base The associated event base object.
     * @param callable  $cb   The event callback. {@see
     *                        http://php.net/manual/en/event.callbacks.php}
     * @param mixed     $arg  Custom data. If specified, it will be passed to the
     *                        callback when event triggers.
     *
     * @return Event Returns Event object on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/event.timer.php
     */
    public static function timer(EventBase $base, callable $cb, mixed $arg = null): Event
    {
    }
}
