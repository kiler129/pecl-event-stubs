<?php

/**
 * Represents Libevent's DNS base structure. Used to resolve DNS asynchronously, parse
 * configuration files like resolv.conf etc.
 */
final class EventDnsBase
{

    /**
     * Tells to read the domain and search fields from the resolv.conf file and the ndots
     * option, and use them to decide which domains(if any) to search for hostnames that
     * aren’t fully-qualified.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventdnsbase.php#eventdnsbase.constants.option-search
     */
    const OPTION_SEARCH = 1;

    /**
     * Tells to learn the nameservers from the resolv.conf file.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventdnsbase.php#eventdnsbase.constants.option-nameservers
     */
    const OPTION_NAMESERVERS = 2;

    /**
     * @var int
     * @link http://php.net/manual/en/class.eventdnsbase.php#eventdnsbase.constants.option-misc
     */
    const OPTION_MISC = 4;

    /**
     * Tells to read a list of hosts from /etc/hosts as part of loading the resolv.conf
     * file.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventdnsbase.php#eventdnsbase.constants.option-hostsfile
     */
    const OPTION_HOSTSFILE = 8;

    /**
     * Tells to learn as much as it can from the resolv.conf file.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventdnsbase.php#eventdnsbase.constants.options-all
     */
    const OPTIONS_ALL = 15;


    /**
     * Adds a nameserver to the DNS base.
     *
     * @param string $ip The nameserver string, either as an IPv4 address, an IPv6
     *                   address, an IPv4 address with a port ( IPv4:Port ), or an IPv6
     *                   address with a port ( [IPv6]:Port ).
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventdnsbase.addnameserverip.php
     */
    public function addNameserverIp(string $ip): bool
    {
    }

    /**
     * Adds a domain to the list of search domains.
     *
     * @param string $domain Search domain.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventdnsbase.addsearch.php
     */
    public function addSearch(string $domain): void
    {
    }

    /**
     * Removes all current search suffixes.
     *
     * Removes all current search suffixes from the DNS base; the
     * EventDnsBase::addSearch() function adds a suffix.
     *
     * @return void
     *
     * @link http://php.net/manual/en/eventdnsbase.clearsearch.php
     * @see  EventDnsBase::addSearch()
     */
    public function clearSearch(): void
    {
    }

    /**
     * EventDnsBase constructor.
     *
     * @param EventBase $base       Event base.
     * @param bool      $initialize If the initialize argument is TRUE, it tries to
     *                              configure the DNS base sensibly given your operating
     *                              system’s default. Otherwise, it leaves the event DNS
     *                              base empty, with no nameservers or options
     *                              configured. In the latter case DNS base should be
     *                              configured manually, e.g. with
     *                              EventDnsBase::parseResolvConf().
     *
     * @link http://php.net/manual/en/eventdnsbase.construct.php
     */
    public function __construct(EventBase $base, bool $initialize)
    {
    }

    /**
     * Gets the number of configured nameservers.
     *
     * @return int Returns the number of configured nameservers(not necessarily the
     *             number of running nameservers). This is useful for double-checking
     *             whether our calls to the various nameserver configuration functions
     *             have been successful.
     *
     * @link http://php.net/manual/en/eventdnsbase.countnameservers.php
     */
    public function countNameservers(): int
    {
    }

    /**
     * Loads a hosts file (in the same format as /etc/hosts) from hosts file.
     *
     * @param string $hosts Path to the hosts' file.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventdnsbase.loadhosts.php
     */
    public function loadHosts(string $hosts): bool
    {
    }

    /**
     * Scans the resolv.conf-formatted file.
     *
     * Scans the resolv.conf-formatted file stored in filename, and read in all the
     * options from it that are listed in flags.
     *
     * @param int    $flags    Determines what information is parsed from the resolv.conf
     *                         file. See the man page for resolv.conf for the format of
     *                         this file. The following directives are not parsed from
     *                         the file: sortlist, rotate, no-check-names, inet6, debug.
     * @param string $filename Path to resolv.conf file.
     *
     * @return bool|int Returns TRUE on success, FALSE on error or numeric error code:
     *                  1 = failed to open file
     *                  2 = failed to stat file
     *                  3 = file too large
     *                  4 = out of memory
     *                  5 = short read from file
     *                  6 = no nameservers listed in the file
     *
     * @link http://php.net/manual/en/eventdnsbase.parseresolvconf.php
     */
    public function parseResolvConf(int $flags, string $filename)
    {
    }

    /**
     * Set the value of a configuration option.
     *
     * @param string $option The currently available configuration options are: "ndots",
     *                       "timeout", "max-timeouts", "max-inflight", and "attempts".
     * @param string $value  Option value.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventdnsbase.setoption.php
     */
    public function setOption(string $option, string $value): bool
    {
    }

    /**
     * Set the 'ndots' parameter for searches.
     *
     * Sets the number of dots which, when found in a name, causes the first query to be
     * without any search domain.
     *
     * @param int $ndots The number of dots.
     *
     * @return bool Returns TRUE on success. Otherwise FALSE.
     *
     * @link http://php.net/manual/en/eventdnsbase.setsearchndots.php
     */
    public function setSearchNdots(int $ndots): bool
    {
    }
}
