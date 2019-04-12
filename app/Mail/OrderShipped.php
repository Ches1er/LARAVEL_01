<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path = public_path().'/'."robots.txt";
        return $this->from('my@my.com',"MYMY")->
            replyTo('admin@ukrpolystroy.com.ua')->
        view('mail.shipped')->with(['name'=>$this->data['name'],
            'token'=>$this->data['token']])->attach($path);
    }
}
