<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUserByEmail(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['username'],
            $user['password']
        );
    }

    public function getUserByUsername(string $username) : ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['username'],
            $user['password']
        );
    }

    public function addUser(User $user){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, username, password) VALUES (:email, :username, :password)
        ');
        $email = $user->getEmail();
        $username = $user->getUsername();
        $hashed_password = $user->getPassword();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function usernameAlreadyExists(string $username): bool
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return false;
        }
        return true;
    }

    public function editUser(User $user){
        $stmt = $this->database->connect()->prepare('
        UPDATE public.users SET name = :name, surname = :surname, elo = :elo WHERE email = :email
        ');

        $name = $user->getName();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $surname = $user->getSurname();
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $name = $user->getElo();
        $stmt->bindParam(':elo', $elo, PDO::PARAM_STR);

        $stmt->execute();
    }
}