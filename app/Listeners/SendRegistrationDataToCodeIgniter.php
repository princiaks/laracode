<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SendRegistrationToCodeIgniter;
use Illuminate\Support\Facades\Http;

class SendRegistrationDataToCodeIgniter
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendRegistrationToCodeIgniter  $event)
    {        
        $user = $event->user;
        $registrationData = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->passwordview
        ];
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
        ->post('http://localhost/codelara/index.php/register', json_encode($registrationData));
            return "success";
            if ($response->successful()) {
           
            } else {
                
            }
    }
}
