<?php

/**
 * timestamp May 14, 2012 9:47:49 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\net\http
 *
 *  Class used for creating cookies.
 *
 */

namespace callow\net\http;


class CookieWriter
{

    /**
     * The default setting for setting the cookie path.
     */

    const DEFAULT_COOKIE_PATH = '/';

    /**
     * Sets the transfer mode to http instead of https as default.
     */
    const DEFAULT_HTTP_MODE = FALSE;

    /**
     *  Sends the http only header as default behaviour.
     */
    const DEFAULT_COOKIE_MODE = TRUE;


    private $name = "";
    private $value = "";
    private $expire = 36000;
    private $path = CookieWriter::DEFAULT_COOKIE_PATH;
    private $domain = "";
    private $secure = CookieWriter::DEFAULT_HTTP_MODE;
    private $http_only = CookieWriter::DEFAULT_COOKIE_MODE;

    public function __construct(array $receipe = NULL)
    {

        if (is_array($receipe))
        {

            $this->setName($receipe['name']);
            $this->setValue($receipe['value']);
            $this->setExpiration($receipe['expiration']);
            $this->setPath($receipe['path']);
            $this->setDomain($receipe['domain']);
            $this->isSecure($receipe['secure']);
            $this->isHttpOnly($receipe['http_only']);

        }

    }

    /**
     * The name of the cookie to be set.
     * @param string $name
     * @return callow\http\CookieWriter
     */
    public function setName($name)
    {

        $this->name = $name;
        return $this;

    }

    /**
     * Sets the value for the cookie.
     * @param string $value
     * @return \callow\http\CookieWriter
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;

    }

    /**
     * Sets the expiration time of the cookie.
     * @param int $unix_time
     * @return \callow\http\CookieWriter
     */
    public function setExpiration($unix_time)
    {

        $this->exprire = $unix_time;
        return $this;

    }

    /**
     * Sets the directory path the cookie can be used with.
     * @param string $path
     * @return \callow\http\CookieWriter
     */
    public function setPath($path)
    {

        $this->path = $path;
        return $this;

    }

    /**
     * Sets the domain the cookie is allowed to be used with.
     * @param string $domain
     * @return \callow\http\CookieWriter
     */
    public function setDomain($domain)
    {

        $this->domain = $domain;
        return $this;

    }

    /**
     * Sets whether http or https is necessary.
     * @param boolean $secure_mode
     * @return \callow\http\CookieWriter
     */
    public function isSecure($secure_mode)
    {

        $this->secure = $secure_mode;
        return $this;

    }

    /**
     * Sets the http-only flag.
     * @param boolean $protocol
     * @return \callow\http\CookieWriter
     */
    public function isHttpOnly($protocol)
    {

        $this->http_only = $protocol;
        return $this;

    }

    /**
     * Prepares a cookie to be sent to the browser;
     * @return \callow\http\CookieWriter
     * @throws \Exception
     */
    public function send()
    {

        if (!setcookie($this->name, $this->value, $this->expire, $this->path, $this->domain, $this->secure, $this->http_only))
        throw new \Exception();

        return $this;

    }

}

?>
