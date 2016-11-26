<?php

/**
 * Represents configuration structure which could be used in construction of the
 * EventBase.
 *
 * @see EventBase
 */
final class EventConfig
{
    /**
     * Requires a backend method that supports edge-triggered I/O.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventconfig.php#eventconfig.constants.feature-et
     */
    const FEATURE_ET = 1;

    /**
     * Requires a backend method where adding or deleting a single event, or having a
     * single event become active, is an O(1) operation.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventconfig.php#eventconfig.constants.feature-o1
     */
    const FEATURE_O1 = 2;

    /**
     * Requires a backend method that can support arbitrary file descriptor types, and
     * not just sockets.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventconfig.php#eventconfig.constants.feature-fds
     */
    const FEATURE_FDS = 4;

    /**
     * Tells libevent to avoid specific event method (backend).
     *
     * @param string $method The backend method to avoid.
     *
     * @return bool Returns TRUE on success, otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventconfig.avoidmethod.php
     * @see  http://www.wangafu.net/~nickm/libevent-book/Ref2_eventbase.html#_creating_an_event_base
     */
    public function avoidMethod(string $method): bool
    {
    }

    /**
     * Constructs EventConfig object.
     *
     * Constructs EventConfig object which could be passed to EventBase::__construct()
     * constructor.
     *
     * @link http://php.net/manual/en/eventconfig.construct.php
     * @see  EventBase::__construct()
     */
    public function __construct()
    {
    }

    /**
     * Enters a required event method feature that the application demands.
     *
     * @param int $feature Bitmask of required features. See EventConfig::FEATURE_*
     *                     constants.
     *
     * @return bool Returns TRUE on success, otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventconfig.requirefeatures.php
     */
    public function requireFeatures(int $feature): bool
    {
    }

    /**
     * Prevents priority inversion.
     *
     * Prevents priority inversion by limiting how many low-priority event callbacks can
     * be invoked before checking for more high-priority events.
     *
     * Note:
     * Available since libevent 2.1.0-alpha.
     *
     * @param int $max_interval  An interval after which Libevent should stop running
     *                           callbacks and check for more events, or 0 , if there
     *                           should be no such interval.
     * @param int $max_callbacks A number of callbacks after which Libevent should stop
     *                           running callbacks and check for more events, or -1 , if
     *                           there should be no such limit.
     * @param int $min_priority  A number of callbacks after which Libevent should stop
     *                           running callbacks and check for more events, or -1 , if
     *                           there should be no such limit.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventconfig.setmaxdispatchinterval.php
     */
    public function setMaxDispatchInterval(
        int $max_interval,
        int $max_callbacks,
        int $min_priority): void
    {
    }
}
