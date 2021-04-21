<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class artistSupport extends Mailable
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
        $send = $this->from('info@pornartistzone')
        ->subject('Artist Issue')
       ->view(array('artists/artistSupportEmail'))
       ->with(
         [
               'data' => $this->data,
               'name'=>$this->name
               
         ]);
                if($this->data['file']){
                    $send->attach($this->data['file']->getRealPath(),
                    ['as'=>$this->data['file']->getClientOriginalName(),
                    'mime'=>$this->data['file']->getClientMimeType(),
                    ]);
                }

                return $send;
    }
}
