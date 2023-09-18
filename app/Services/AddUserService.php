<?php

namespace App\Services;

use App\Models\User;

class AddUserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($data)
    {
        return $this->user->create($data);
    }

}
