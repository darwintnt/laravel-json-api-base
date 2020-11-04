<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Interfaces\UserInterface;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;

class UserController extends JsonApiController
{
    private $service;

    public function __construct(UserInterface $service)
    {
        $this->service = $service;
    }

    public function share(Request $request)
    {
        return $this->reply()->content($this->service->share($request->all()));
    }

}
