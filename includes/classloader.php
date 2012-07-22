<?php
/**
 * Simple callow compatible class loader. Assumes that classes are single file and are in folders
 * corresponding to their namespace.
 *
 * THIS FILE MUST BE IN THE INCLUDE PATH ROOT TO BE OF ANY USE!
 *
 * meta
 *
 */
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