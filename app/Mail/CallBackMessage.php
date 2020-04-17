<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallBackMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data['name'] = ($request->name) ? $request->name : "";
        $this->data['subject'] = ($request->subject) ? $request->subject : "";
        $this->data['email'] = ($request->email) ? $request->email : "";
        $this->data['phone'] = ($request->phone) ? $request->phone : "";
        // $this->data['file'] = ($request->file) ? $request->file : "";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.callback')->attach(($this->data['file']) ? $this->data['file'] : "");
        return $this->view('emails.callback');
    }
}
