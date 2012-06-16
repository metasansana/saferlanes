<?php

/**
 * timestamp Jun 11, 2012 2:38:09 PM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\fio
 *
 *
 */

namespace callow\fio;


class File
{

    /**
     * Mode for read only files.
     */

    const R = 'r';

    /**
     * Mode for reading and writing files.
     */
    const RW = "r+";

    /**
     * Mode for writing new files (overwrites existing ones).
     */
    const W = 'w';

    /**
     * Mode W with reading enabled.
     */
    const WR = 'w+';

    /**
     * Mode for appending a file (creates a file if file name does not exist).
     */
    const A = 'a';

    /**
     * Mode A with reading enabled.
     */
    const AR = 'a+';

    protected $modes = array ('r', 'r+', 'w', 'w+', 'a', 'a+');

    /**
     * The path to the file.
     * @var string $path
     * @access protected
     */
    protected $path;

    /**
     * The mode the file was opened with
     * @var string $mode
     */
    protected $current_mode;

    /**
     * A handle to the file.
     * @var resource $handle
     * @access protected
     */
    protected $handle;

    public function __construct($file_name)
    {
        if (!is_string($file_name))
            throw new \Exception('File name must be a string!');

        $this->path = $file_name;

    }

    /**
     * Attempts to open a file.
     * @param type $mode
     * @return \callow\fio\File
     * @throws Exception
     * @throws FileNotFoundException
     * @throws FilePermissionException
     */
    public function open($mode)
    {

        if (!in_array($mode, $this->modes))
            throw new \Exception('Mode must be a string!');

        if (!file_exists($this->path))
        {
            throw new FileNotFoundException();
        }

        $mode .= 'b';

        $handle = fopen($this->path, $mode);

        if ($handle)
        {
            $this->handle = $handle;
            $this->current_mode = $mode;
        }
        else
        {
            throw new FilePermissionException();
        }

        return $this;

    }

    /**
     * Attempts to close the handle to the file.
     * @return boolean
     */
    public function close()
    {
        if ($this->handle)
        {
            return fclose($this->handle);
        }

        return FALSE;

    }

    /**
     * Attempts to reset the internal pointer of the file.
     * @return boolean
     * @throws \Exception
     */
    public function reset()
    {
        if ($this->current_mode == 'a' || 'a+')
        {
            throw new \Exception('Cannot reset while in append mode!');
        }

        if (!$this->handle)
        {
            return FALSE;
        }

        return rewind($this->handle);

    }

    /**
     *Returns the current mode of the file handle.
     * @return string $mode
     */
    public function getMode()
    {
        return $this->current_mode;

    }

    /**
     * Returns the path to the file
     * @return string $path
     */
    public function getPath()
    {
        return $this->path;

    }

    /**
     * Returns the internal file handle.
     * @return resource $handle
     */
    public function getHandle()
    {
        return $this->handle;

    }


    /**
     * Returns an array of the supported modes.
     * @return array
     */
    public function getModes()
    {

        return $this->modes;

    }


    public function __destruct()
    {
        $this->close();

    }

}

?>
