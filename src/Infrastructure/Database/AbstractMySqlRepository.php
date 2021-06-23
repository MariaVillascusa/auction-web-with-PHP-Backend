<?php


namespace IESLaCierva\Infrastructure\Database;


abstract class AbstractMySqlRepository
{
    protected \PDO $connection;

    public function __construct()
    {
        $this->connection = Connection::create();
    }
}