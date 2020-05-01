<?php

namespace App\Libraries;

use App\Libraries\NotificationsInterface;

class Notifications implements NotificationsInterface
{
    public function send()
    {
        var_dump('notify');
    }
}
