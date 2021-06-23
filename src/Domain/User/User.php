<?php

namespace IESLaCierva\Domain\User;

use IESLaCierva\Domain\User\Exceptions\EmailNotValidException;
use IESLaCierva\Domain\User\ValueObject\Email;
use IESLaCierva\Domain\User\ValueObject\Role;

class User implements \JsonSerializable
{
    private string $id;
    private string $name;
    private string $username;
    private Email $email;
    private string $password;
    private Role $role;

    public function __construct(string $id, string $name, string $username, Email $email, string $password, Role $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public static function create(string $name, string $username, Email $email, string $password): User
    {
        return new self(uniqid(), $name, $username, $email, $password, new Role(Role::USER));
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function role(): Role
    {
        return $this->role;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'username' => $this->username(),
            'email' => $this->email()->value(),
            'password' => $this->password(),
            'role' => $this->role()->value(),
        ];
    }


}
