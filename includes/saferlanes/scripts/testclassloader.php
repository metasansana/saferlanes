<?php

// @date Jun 24, 2012 12:55:32 AM
// @author Lasana Murray  <lmurray@trinistorm.org>
// @project saferlanes
// Copyright (C) 2012 Lasana Murray

//This is a script to help loading classes when testing.
//The aim here is not  to modify the include path and hinder cli php unit
spl_autoload_register(function ($package)
{
            printf("Starting");
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
            $package = "/srv/www/saferlanes/includes/".$package; //XXX this is specific to my instalation change for yours!

            if (file_exists($package))
            {
                require_once $package;
                return;
            }

        }

            printf("Could not locate the class ---> $package");


});
?>
