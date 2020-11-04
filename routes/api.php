<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

JsonApi::register('v1')->withNamespace('Api')->routes(function ($api) {

    $api->resource('users')->controller('UserController')->routes(function ($users) {
        $users->get('/share', 'share');
    });

});
