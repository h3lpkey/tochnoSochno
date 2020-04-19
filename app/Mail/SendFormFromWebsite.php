<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFormFromWebsite extends Mailable
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
        $this->data['name'] = $request->name;
        $this->data['subject'] = $request->subject;
        $this->data['email'] = $request->email;
        $this->data['phone'] = $request->phone;
        $this->data['file'] = $request->file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.callback')->subject('Точно Сочно')->attach(
            $this->data['file']->getRealPath(),
            [
                'as' => $this->data['file']->getClientOriginalName(),
                'mime' => $this->data['file']->getClientMimeType(),
            ]
        );;
    }
}
