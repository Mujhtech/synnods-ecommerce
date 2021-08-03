<?php

namespace App\Services;
use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class SendMailService {

    private $site_title;

    private $site_url;

    private $site_email;
    
    private $site_name;

    private $subject;

    private $content;

    private $header;

    private $footer;

    public function __construct(){

        $this->site_name = Setting::where('type', 'site_name')->first()->value;
        $this->site_email = Setting::where('type', 'site_email')->first()->value;
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

        $header = str_replace("%header%", $this->site_url, $this->header);
        $header = str_replace("%site_logo%", 'https://ui-avatars.com/api/?name='.urlencode($this->site_name).'&color=7F9CF5&background=EBF4FF', $header);
        $header = str_replace("%site_title%", $this->site_name, $header);
        $header = str_replace("%date_time%", date('d F, Y, H:i:s'), $header);
        $content = str_replace("%header%", $header, $this->content);
        $content = str_replace("%footer%", $this->footer, $content);

        $headers = "From: $this->site_name <support@varspay.com> \r\n";
		$headers .= "Reply-To: $this->site_name <support@varspay.com> \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		if (mail($email, $this->subject, $content, $headers)) {
		    return true;
		} else {
		    return false;
		}

        //Mail::to($email)->send(new SendMail($content, $this->subject));

    }
}