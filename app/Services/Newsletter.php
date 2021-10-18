<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use App\Providers\AppServiceProvider;

class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

        return $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
