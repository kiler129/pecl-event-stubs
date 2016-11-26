<?php

/**
 * EventBase class represents libevent's event base structure. It holds a set of events
 * and can poll to determine which events are active.
 *
 * Each event base has a method, or a backend that it uses to determine which events are
 * ready. The recognized methods are: select, poll, epoll, kqueue, devpoll, evport
 * and win32. To configure event base to use, or avoid specific backend EventConfig
 * class can be used.
 *
 * @see  EventConfig
 * @link http://php.net/manual/en/class.eventbase.php
 */
final class EventBase
{
    /**
     * Flag used with EventBase::loop() method which means: "block until libevent has an
     * active event, then exit once all active events have had their callbacks run".
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.loop-once
     * @see  EventBase::loop()
     */
    const LOOP_ONCE = 1;

    /**
     * Flag used with EventBase::loop() method which means: "do not block: see which
     * events are ready now, run the callbacks of the highest-priority ones, then exit".
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.loop-nonblock
     * @see  EventBase::loop()
     */
    const LOOP_NONBLOCK = 2;

    /**
     * Configuration flag. Do not allocate a lock for the event base, even if we have
     * locking set up".
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.nolock
     */
    const NOLOCK = 1;

    /**
     * Windows-only configuration flag. Enables the IOCP dispatcher at startup.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.startup-iocp
     */
    const STARTUP_IOCP = 4;

    /**
     * Configuration flag. Instead of checking the current time every time the event loop
     * is ready to run timeout callbacks, check after each timeout callback.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.no-cache-time
     */
    const NO_CACHE_TIME = 8;

    /**
     * If we are using the epoll backend, this flag says that it is safe to use
     * Libevent's internal change-list code to batch up adds and deletes in order to try
     * to do as few syscalls as possible.
     *
     * Setting this flag can make code run faster, but it may trigger a Linux bug: it is
     * not safe to use this flag if one has any fds cloned by dup(), or its variants.
     * Doing so will produce strange and hard-to-diagnose bugs. This flag can also be
     * activated by setting the EVENT_EPOLL_USE_CHANGELIST environment variable. This
     * flag has no effect if one winds up using a backend other than epoll.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventbase.php#eventbase.constants.epoll-use-changelist
     */
    const EPOLL_USE_CHANGELIST = 16;


    /**
     * Constructs EventBase object.
     *
     * @param EventConfig $cfg [optional] Optional EventConfig object.
     *
     * @link http://php.net/manual/en/eventbase.construct.php
     */
    public function __construct(EventConfig $cfg = null)
    {
    }

    /**
     * Dispatch pending events.
     *
     * Wait for events to become active, and run their callbacks. The same as
     * EventBase::loop() with no flags set.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbase.dispatch.php
     * @see  EventBase::loop()
     */
    public function dispatch(): void
    {
    }

    /**
     * Stop dispatching events.
     *
     * Tells event base to stop optionally after given number of seconds.
     *
     * @param double $timeout [optional] Optional number of seconds after which the event
     *                        base should stop dispatching events.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.exit.php
     */
    public function exit(double $timeout = null): bool
    {
    }

    /**
     * Free resources allocated for this event base.
     *
     * Deallocates resources allocated by libevent for the EventBase object.
     *
     * Warning:
     *  The EventBase::free() method doesn't destruct the object itself. To destruct the
     *  object completely call unset(), or assign NULL. This method does not deallocate
     *  or detach any of the events that are currently associated with the EventBase
     *  object, or close any of their sockets - beware.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventbase.free.php
     */
    public function free(): void
    {
    }

    /**
     * Returns bitmask of features supported.
     *
     * @return int Returns integer representing a bitmask of supported features. See
     *             EventConfig::FEATURE_* constants.
     *
     * @link http://php.net/manual/en/eventbase.getfeatures.php
     */
    public function getFeatures(): int
    {
    }

    /**
     * Returns event method in use.
     *
     * @return string String representing used event method(backend).
     *
     * @link http://php.net/manual/en/eventbase.getmethod.php
     */
    public function getMethod(): string
    {
    }

    /**
     * Returns the current event base time.
     *
     * On success returns the current time(as returned by gettimeofday() ), looking at
     * the cached value in base if possible, and calling gettimeofday() or
     * clock_gettime() as appropriate if there is no cached time.
     *
     * @return double Returns the current event base time. On failure returns NULL.
     *
     * @link http://php.net/manual/en/eventbase.gettimeofdaycached.php
     */
    public function getTimeOfDayCached(): double
    {
    }

    /**
     * Checks if the event loop was told to exit.
     *
     * Checks if the event loop was told to exit by EventBase::exit().
     *
     * @return bool Returns TRUE, event loop was told to exit by EventBase::exit().
     *              Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.gotexit.php
     * @see  EventBase::exit()
     */
    public function gotExit(): bool
    {
    }

    /**
     * Checks if the event loop was told to exit.
     *
     * Checks if the event loop was told to exit by EventBase::stop().
     *
     * @return bool Returns TRUE, event loop was told to stop by EventBase::stop().
     *              Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.gotstop.php
     * @see  EventBase::stop()
     */
    public function gotStop(): bool
    {
    }

    /**
     * Dispatch pending events.
     *
     * Wait for events to become active, and run their callbacks.
     *
     * @param int $flags [optional] Optional flags. One of EventBase::LOOP_* constants.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.loop.php
     */
    public function loop(int $flags = null): bool
    {
    }

    /**
     * Sets number of priorities per event base.
     *
     * @param int $n_priorities The number of priorities per event base.
     *
     * @return bool Returns TRUE on success, otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.priorityinit.php
     */
    public function priorityInit(int $n_priorities): bool
    {
    }

    /**
     * Re-initialize event base (after a fork).
     *
     * Re-initialize event base. Should be called after a fork.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.reinit.php
     */
    public function reInit(): bool
    {
    }

    /**
     * Tells event_base to stop dispatching events.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventbase.stop.php
     */
    public function stop(): bool
    {
    }
}
