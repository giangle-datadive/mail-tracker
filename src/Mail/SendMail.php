<?php

namespace MailTracker\Mail;

use MailTracker\Models\MailTracker;
use Illuminate\Support\Facades\Mail;
use MailTracker\Mail\MailFromTemplate;

class SendMail
{
    public function send($recipient, $mailData, $replaceData = [])
    {
        $initialMailData = [
            'subject' => null,
            'content' => null,
            'campaign_name' => null,
        ];
        $mailData = array_merge($initialMailData, $mailData);

        //Store in database
        $mailTracker = MailTracker::create([
            'recipient' => $recipient,
            'hash' => uniqid("", true),
            'campaign_name' => $mailData['campaign_name'],
        ]);

        //Sendmail
        $mailData['hash'] = $mailTracker->hash;
        $this->replaceData($mailData, $replaceData);
        Mail::to($recipient)->queue(new MailFromTemplate($mailData));
    }

    private function replaceData(&$mailData, $replaceData = [])
    {
        foreach ($replaceData as $key => $item) {
            $mailData['content'] = str_replace("$$key", $item, $mailData['content']);
        }
        $pattern = "/(<a[^>]*href=['\"])([^'\"]*)/";

        $mailData['content'] = preg_replace_callback($pattern, function ($matches) use ($mailData) {
            return str_replace($matches[2], route('mail_tracker.click', ['hash' => $mailData['hash'], 'url' => base64_encode($matches[2])]), $matches[0]);
        }, html_entity_decode($mailData['content']));
    }
}
