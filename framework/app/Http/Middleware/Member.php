<?php
namespace App\Http\Middleware;

use \TypeRocket\Http\Middleware\Middleware;

class Member extends Middleware
{

    public function handle()
    {
        $request = $this->request;
        $response = $this->response;

        // Do stuff before controller is called

        $this->next->handle();

        // Do stuff after controller is called
    }
}