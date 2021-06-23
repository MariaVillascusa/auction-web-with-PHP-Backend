<?php


namespace IESLaCierva\Infrastructure\Database;


use IESLaCierva\Domain\User\User;
use IESLaCierva\Domain\User\UserRepository;
use IESLaCierva\Domain\User\ValueObject\Email;
use IESLaCierva\Domain\User\ValueObject\Role;

class MySqlUserRepository extends AbstractMySqlRepository implements UserRepository
{
    public function findAll(): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = $this->hydrate($row);
        }
        return $users;
    }

    public function findById(string $id): ?User
    {
        $stmt = $this->connection->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        if ($stmt->rowCount() === 0) {
            return null;
        }
        return $this->hydrate($stmt->fetch());
    }

    public function findByUsername(string $username): ?User
    {
        $stmt = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        if ($stmt->rowCount() === 0) {
            return null;
        }
        return $this->hydrate($stmt->fetch());
    }

    public function save(User $user): void
    {
        $stmt = $this->connection->prepare('REPLACE INTO users(id, name,username, email, password, role)
                VALUES (:id, :name, :username, :email, :password, :role)');

        $stmt->execute(
            [
                'id' => $user->id(),
                'name' => $user->name(),
                'username' => $user->username(),
                'email' => $user->email()->value(),
                'password' => $user->password(),
                'role' => $user->role()->value()
            ]
        );
    }

    private function hydrate(array $data): User
    {
        return new User(
            $data['id'],
            $data['name'],
            $data['username'],
            new Email($data['email']),
            $data['password'],
            new Role($data['role'])
        );
    }


}