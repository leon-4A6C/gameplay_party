<?php
/**
 * the file handler
 */
class FileHandler
{

    /**
     * creates a file
     *
     * @param string $content
     * @param string $file
     * @return string the filename
     */
    public function create($content, $file = "bla.txt")
    {
        $handle = fopen($file, "w");
        fwrite($handle, $content);
        return $file;
    }

    /**
     * reads a file
     *
     * @param string $file filename
     * @return string file content
     */
    public function read($file)
    {
        $handle = fopen($file, "r");
        return fread($handle, filesize($file) + 1);
    }

    /**
     * updates a file
     *
     * @param string $content the new content
     * @param string $file the filename
     * @return void
     */
    public function update($content, $file)
    {
        $handle = fopen($file, "w+");
        return fwrite($handle, $content);
    }
    
    /**
     * deletes a file
     *
     * @param string $file filename
     * @return void
     */
    public function delete($file)
    {
        return unlink($file);
    }
}
