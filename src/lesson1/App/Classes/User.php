<?php

namespace App\Classes;

class User
{
    public string $name = "John Doe";
    public string $email;
    public function __construct(string $name = 'John Doe') {
        $this->name = $name;
    }
    public function getUser() {
        return $this->name;
    }
    public function getFullName() {
        return $this->name . ' fullname';
    }
}