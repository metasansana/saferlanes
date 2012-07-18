<?php
/**
 * Checks for pending updates before each run
 */

clearstatcache();

if(stream_resolve_include_path("saferlanes/pending"))
{
    define('UPDATING', 0x1);
}


?>
