<?php


namespace IESLaCierva\Domain\User;


interface UserRepository
{
    public function findAll(): array;

    public function findById(string $id): ?User;

    public function findByUsername(string $username): ?User;

    public function save(User $user): void;
}