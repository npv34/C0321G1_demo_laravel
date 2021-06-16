<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;

class UserService
{
    protected $userRepo;
    public function __construct(UserRepository  $userRepository)
    {
        $this->userRepo = $userRepository;
    }
}
