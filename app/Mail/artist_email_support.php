<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class artist_email_support extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$name)
    {
        $this->data = $data;
        $this->name = $name;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('artist@pornartistzone')
        ->subject('Your Issue')
       ->view(array('artists/email_artist'))
       ->with(
         [
               'data' => $this->data,
               'name'=>$this->name
               
         ]);
    }
}
