<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Login;

class CustomSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Set your custom session variable here
        dd($event);
        Session::put('name', 'my_custom_value');
    }
}
