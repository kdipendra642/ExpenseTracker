<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * List All User
     */
    public function getAllUsers(): object
    {
        return $this->userRepository->fetchAll();
    }

    /**
     * Store User
     */
    public function storeUsers(array $data): void
    {
        $userData = [
            'name' => $data['name'], 
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
        ];
        $this->userRepository->store($userData);
    }
}