<?php

namespace IESLaCierva\Application\User\CreateNewUser;

use IESLaCierva\Domain\User\User;
use IESLaCierva\Domain\User\UserRepository;
use IESLaCierva\Domain\User\ValueObject\Email;

class CreateNewUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $name, string $username, string $email, string $password)
    {
        $user = User::create($name, $username, new Email($email), $password);
        $this->userRepository->save($user);
    }
}
