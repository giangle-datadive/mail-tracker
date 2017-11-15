{!! $mailData['content'] !!} 
@if(config('mail-tracker.tracking'))
    @include('mail_tracker::tracking_open')
@endif