<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class SendMail extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

    protected $content;

    public $subject;

    protected $site_title;

    protected $site_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $subject)
    {
        //
        $this->content = $content;

        $this->subject = $subject;

        $this->site_title = Setting::where('type', 'site_title')->first()->value;
        $this->site_email = Setting::where('type', 'site_email')->first()->value;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->site_email, $this->site_title)->subject($this->subject)->view('mail.send')->with(['content' => $this->content]);
    }
}
