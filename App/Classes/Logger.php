<?php

namespace App;

class Logger
{
    use Singleton;
    public $date;
    public $error;
    public $file;
    public $logFile;
    public $line;

    public function __construct()
    {
        $this->logFile = 'Log.txt';
    }

    public function log($ex)
    {
        $res = fopen($this->logFile, 'a');
        $this->date = date('l jS \of F h:i:s A');
        $this->error = $ex->getMessage();
        $this->file = $ex->getFile();
        $this->line = $ex->getLine();
        foreach ($this as $value) {
            if ($value != 'Log.txt') {
                fwrite($res, $value . "\n");
            }
        }
        fclose($res);
    }

}
