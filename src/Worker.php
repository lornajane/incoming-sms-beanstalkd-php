<?php

class Worker {
    protected $outfile;

    public function __construct($options)
    {
        if ($options['outfile']) {
            $this->outfile = $options['outfile'];
        }
    }

    public function process($data)
    {
        $this->write_to_file($this->outfile, $data['text']);
        return true;
    
    }

    protected function write_to_file($filename, $text)
    {
        file_put_contents(
            $filename, 
            $text . "\n",
            FILE_APPEND
        );

        return true;
    }
}
