<?php
namespace App\Classes;
use App\Classes\User;
interface UserRepositoryInterface
{
    public function findUserByEmail(string $email): ?User;
}