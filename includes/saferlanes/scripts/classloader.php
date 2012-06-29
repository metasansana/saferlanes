<?php

// @date May 7, 2012 6:15:53 PM
// @author Lasana Murray  <lmurray@trinistorm.org>
// @project saferlanes
// Copyright (C) 2012 Lasana Murray

/*Class loader*/
spl_autoload_extensions('.php');
spl_autoload_register(function ($package)
{
     $php = '.php';

        $package = str_replace("\\", '/', $package) . $php;

        if (file_exists($package))
        {
            require_once $package;
            return;
        }
        else
        {
            //check the include path
            $package = str_replace('.:', NULL, get_include_path() . DIRECTORY_SEPARATOR . $package);
            if (file_exists($package))
            {
                require_once $package;
                return;
            }
        }

});




?>
