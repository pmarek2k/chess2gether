<?php

class User {
    private $email;
    private $password;
    private $username;
    private $name;
    private $surname;

    public function __construct(
        string $email,
        string $username,
        string $password
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }



    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}