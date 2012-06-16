<?php

/**
 * timestamp Jun 11, 2012 4:16:44 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\fio
 *
 *
 */

namespace callow\fio;

class LineReader
{

    /**
     * The maximum number of bytes to read per line.
     * @var int $max_length
     * @access private
     */
    private $max_length;

    /**
     * An open file that is to be read.
     * @var File $file
     * @access private
     */
    private $file;

    /**
     * The next string to be returned from the file.
     * @var string $next
     */
    private $next = FALSE;

    public function __construct(File $file)
    {
        $this->file = $file;
    }



    public function hasNext()
    {

        if($this->next)
            return TRUE;

        return FALSE;
    }

    public function readLine()
    {

        if($this->max_length)
        {
            $next = fgets($this->file->getHandle(), $this->max_length);
        }
        else
        {
        $next = fgets($this->file->getHandle());
        }

        if($next === PHP_EOL)
            $next = FALSE;

        $this->next = $next;

        return $this->next;
    }

    public function setByteLimit($limit)
    {
        if(is_int($limit))
            $this->max_length = $limit;

        return $this;
    }


}

?>
