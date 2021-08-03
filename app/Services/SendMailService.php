<?php

namespace App\Services;
use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class SendMailService {

    private $site_title;

    private $site_url;

    private $subject;

    private $content;

    private $header;

    private $footer;

    public function __construct(){

        $this->site_title = Setting::where('type', 'site_title')->first()->value;
        $this->site_url = Setting::where('type', 'site_url')->first()->value;
        $this->header = EmailTemplate::where('type', 'header')->first()->content;
        $this->footer = EmailTemplate::where('type', 'footer')->first()->footer;

    }

    public function email_type(string $type){

        $template = EmailTemplate::where('type', $type)->first();

        $this->subject = $template->title;
        $this->content = $template->content;

        return $this;
    }

    public function welcome_user(string $name){

        $this->subject = str_replace("%site_title%",$this->site_title,$this->subject);
        $this->content = str_replace("%customer_name%", $name, $this->content);
        $this->content = str_replace("%site_url%", $this->site_url, $this->content);

        return $this;

    }


    public function reset_account(string $token){

        $url = url('/').'/auth/reset/'.$token;

        $this->content = str_replace("%reset_link%", $url, $this->content);
        $this->content = str_replace("%site_title%", $this->site_url, $this->content);

        return $this;

    }

    public function verify_account(string $token){

        $url = url('/').'/auth/verify/'.$token;

        $this->content = str_replace("%verify_link%", $url, $this->content);
        $this->content = str_replace("%site_title%", $this->site_url, $this->content);

        return $this;

    }

    public function send(string $email){

        $content = str_replace("%header%", $this->header, $this->content);
        $content = str_replace("%footer%", $this->footer, $content);

        Mail::to($email)->send(new SendMail($content, $this->subject));

    }
}