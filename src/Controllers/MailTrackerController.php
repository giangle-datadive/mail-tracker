<?php

namespace MailTracker\Controllers;

use Illuminate\Routing\Controller;
use MailTracker\Models\MailTracker;

class MailTrackerController extends Controller
{
    public function open()
    {
        $hash = request('hash');
        $mailTracker = MailTracker::whereHash($hash)->first();
        if ($mailTracker) {
            $mailTracker->opens = $mailTracker->opens + 1;
            $mailTracker->save();
        }

        return response()->file(public_path('/vendor/mail-tracker/invi.png'));
    }

    public function click()
    {
        $hash = request('hash');
        $url = base64_decode(request('url'));
        $mailTracker = MailTracker::whereHash($hash)->first();
        if ($mailTracker) {
            $mailTracker->clicks = $mailTracker->clicks + 1;
            $mailTracker->save();
        }

        return redirect($url);
    }

}
