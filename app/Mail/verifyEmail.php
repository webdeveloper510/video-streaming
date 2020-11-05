<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$id)
    {
        //
         $this->data = $data;
         $this->userId = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->from('sender@example.com')
                     ->subject('Email Verification')
                    ->view('mail')
                    ->with(
                      [
                            'data' => $this->data,
                            'id'=>$this->userId
                            
                      ]);
                     
    }
}
