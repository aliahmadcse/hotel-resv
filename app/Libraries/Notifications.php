<?php

namespace App\Libraries;

use App\Mail\Reservations;
use Illuminate\Support\Facades\Mail;
use App\Libraries\NotificationsInterface;

class Notifications implements NotificationsInterface
{
    public function send()
    {
        Mail::to('sample@test.com')->send(new Reservations("Ali"));
    }
}
