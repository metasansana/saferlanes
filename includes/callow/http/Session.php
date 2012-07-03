<?php

/**
 * timestamp May 9, 2012 12:25:44 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\http
 *
 * Class for managing a session. This class only supports cookie based session.
 *
 */

namespace callow\http;

use callow\util\GenericCollection;

class Session extends GenericCollection
{

    /**
     * Default name of callow session cookies;
     */

    const DEFAULT_NAME = 'CALSEZ';

    public function __construct($name = NULL)
    {

        $this->start($name);

    }

    /**
     * Clears all session stored data.
     *  @return \callow\http\session\Session
     */
    public function clear()
    {

        $this->collected = array ();
        return $this;

    }

    public function regenerate($reset = FALSE)
    {

        session_regenerate_id($reset);

        return $this;

    }

    /**
     * Destroys the current session.
     * @return \callow\http\session\Session
     */
    public function destroy()
    {


        $params = session_get_cookie_params();

        $params['http_only'] = &$params['httponly'];

        $params['name'] = session_name();

        $params['value'] = '';

        $params['expiration'] = time() - 130000;

        $cw = new CookieWriter($params);

        $cw->send();

        session_destroy();

        $this->collected = array ();

        return $this;

    }

    /**
     * Starts or continues a session
     */
    private function start($name = NULL)
    {

        if (!$name)
            $name = Session::DEFAULT_NAME;

        session_name($name);

        @session_start();

        $this->collected = &$_SESSION;

    }


}

?>
