<?php

namespace MailTracker\Models;

use Illuminate\Database\Eloquent\Model;

class MailTracker extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'send_succeed' => 'boolean',
    ];

    protected $table = 'mail_trackers';
}
