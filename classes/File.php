<?php

class File {
    private string $file;
    private string $method;
    private int $size = 0;
    private $handle;
    private array $arrayMethod = array("r" , "r+" , "w", "w+", "a", "a+", "x", "x+", "c", "c+", "e");

    function __construct(string $file, string $method)
    {
        $this->file =$file;
        if(in_array($method, $this->arrayMethod)) {
            $this->method = $method;
            if ($this->handle = fopen($this->file, $this->method)) {
            $this->size = filesize($this->file); 
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    function lecture(int $sizeParam = null)
    {
        if ($sizeParam !== null) {
            $sizeParam = abs($sizeParam);
        }

        if($sizeParam > 0 && $sizeParam <= $this->size) {
            return fread($this->handle, $sizeParam); 
        }
        elseif ($sizeParam === null || $sizeParam > $this->size || $sizeParam === 0) {
            return fread($this->handle, $this->size);
        }
        else {
            return false;
        }
    }

    function __destruct()
    {
        fclose($this->handle);
    }
}