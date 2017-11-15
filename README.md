# MailTracker
## Install (Laravel)

Via Composer

``` bash
$ composer require gianglevan94/mail-tracker
```

Add the following to the providers array in config/app.php:

``` php
MailTracker\Providers\MailTrackerProvider::class,
```

Publish the config file and migration
``` bash
$ php artisan vendor:publish --provider='MailTracker\Providers\MailTrackerProvider'
```

Clear the cache
``` bash
$ php artisan config:cache
```

Run the migration
``` bash
$ php artisan migrate
```

## Usage 
``` php
use MailTracker\Mail\SendMail;
....
$data['content'] = 'sjkaghjkagh http://google.com giang';
$data['camapign_name'] = 'test';
$replaceData = [
    '$whatever' => 'Something' 
];
(new SendMail)->send('example@gmail.com', $data, $replaceData);
```