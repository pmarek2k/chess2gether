<?php

class User {
    private $email;
    private $password;
    private $username;

    public function __construct(
        string $email,
        string $username,
        string $password
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getElo()
    {
        return $this->elo;
    }
}