<?php

class SecureWorker extends Worker {

    protected $creds;

    /**
     * The credentials won't change so we can create this 
     * once and then use it for every incoming message
     */
    public function __construct($data, $creds)
    {
        parent::__construct($data);

        // would be good to check the creds look right first really
        $this->creds = $creds;
    } 

    public function process($data)
    {
        if ($this->validateMessageSignature($data)) {
            $this->write_to_file($this->outfile, $data['text']);
            return true;
        }

        return false;
    }

    protected function validateMessageSignature($data)
    {
        // the Nexmo\Client library does this part for us
        $signature = new \Nexmo\Client\Signature(
            $data['payload'],
            getenv('NEXMO_API_SIGNATURE_SECRET'),
            'sha256'
        );
        return $signature->check($data['payload']['sig']);
    }

}
