<?php

/**
 * Represents SSL_CTX structure. Provides methods and properties to configure the SSL
 * context.
 */
final class EventSslContext
{
    /**
     * SSLv2 client method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv2-client-method
     */
    const SSLv2_CLIENT_METHOD = 1;

    /**
     * SSLv3 client method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv3-client-method
     */
    const SSLv3_CLIENT_METHOD = 2;

    /**
     * SSLv23 client method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv23-client-method
     */
    const SSLv23_CLIENT_METHOD = 3;

    /**
     * TLS client method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.tld-client-method
     */
    const TLS_CLIENT_METHOD = 4;

    /**
     * SSLv2 server method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv2-server-method
     */
    const SSLv2_SERVER_METHOD = 5;

    /**
     * SSLv3 server method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv3-server-method
     */
    const SSLv3_SERVER_METHOD = 6;

    /**
     * SSLv23 server method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.sslv23-server-method
     */
    const SSLv23_SERVER_METHOD = 7;

    /**
     * TLS server method. See SSL_CTX_new(3) man page.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.tls-server-method
     */
    const TLS_SERVER_METHOD = 8;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct(). The
     * option points to path of local certificate.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-local-cert
     * @see  EventSslContext::__construct()
     */
    const OPT_LOCAL_CERT = 1;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct(). The
     * option points to path of the private key.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-local-pk
     * @see  EventSslContext::__construct()
     */
    const OPT_LOCAL_PK = 2;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents passphrase of the certificate.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-passphrase
     * @see  EventSslContext::__construct()
     */
    const OPT_PASSPHRASE = 3;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents path of the certificate authority file.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-ca-file
     * @see  EventSslContext::__construct()
     */
    const OPT_CA_FILE = 4;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents path where the certificate authority file should be searched for.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-ca-path
     * @see  EventSslContext::__construct()
     */
    const OPT_CA_PATH = 5;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents option that allows self-signed certificates.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-allow-self-signed
     * @see  EventSslContext::__construct()
     */
    const OPT_ALLOW_SELF_SIGNED = 6;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents option that tells Event to verify peer.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-verify-peer
     * @see  EventSslContext::__construct()
     */
    const OPT_VERIFY_PEER = 7;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents option that tells Event to verify peer.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-verify-depth
     * @see  EventSslContext::__construct()
     */
    const OPT_VERIFY_DEPTH = 8;

    /**
     * Key for an item of the options' array used in EventSslContext::__construct().
     * Represents option that tells Event to verify peer.
     *
     * @var int
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.constants.opt-ciphers
     * @see  EventSslContext::__construct()
     */
    const OPT_CIPHERS = 9;

    /**
     * @var string
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.props.local-cert
     * @see  EventSslContext::__construct()
     */
    public $local_cert;

    /**
     * @var string
     * @link http://php.net/manual/en/class.eventsslcontext.php#eventsslcontext.props.local-pk
     * @see  EventSslContext::__construct()
     */
    public $local_pk;

    /**
     * Constructs an OpenSSL context for use with Event classes
     *
     * @param string $method  One of EventSslContext::*_METHOD constants.
     * @param string $options Associative array of SSL context options One of
     *                        EventSslContext::OPT_* constants.
     */
    public function __construct(string $method, string $options)
    {
    }
}
