<?php

namespace App\JsonApi\Users;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

    /**
     * @param \App\Models\User $user
     * the domain record being serialized.
     * @return string
     */
    public function getId($user)
    {
        return (string) $user->getRouteKey();
    }

    /**
     * @param \App\Models\User $user
     * the domain record being serialized.
     * @return array
     */
    public function getAttributes($user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'created-at' => $user->created_at,
            'updated-at' => $user->updated_at,
        ];
    }
}
