<?php
namespace App\Http\Middleware;

use \TypeRocket\Http\Middleware\Middleware;

class Member extends Middleware
{

    public function handle()
    {
        $request = $this->request;
        $response = $this->response;

        $currentUser = wp_get_current_user();

        if ($currentUser->ID && in_array('subscriber', (array)$currentUser->roles)) {

            $this->next->handle();
        } else {

            $this->response->setError('auth', false);
            $this->response->flashNow("Sorry, you don't have enough rights.", 'error');
            $this->response->exitAny(401);
        }

        // Do stuff before controller is called

        // $this->next->handle();

        // Do stuff after controller is called
    }
}
