<?php


namespace IESLaCierva\Infrastructure\Database;


class Connection
{
    private static ?\PDO $instance = null;

    private function __construct()
    {
       self::$instance = new \PDO($_SERVER['MYSQL_DSN'], $_SERVER['MYSQL_ROOT'], $_SERVER['MYSQL_PASSWORD'], []);
    }

    public static function create(): \PDO
    {
        if (null === self::$instance) {
            new self();
        }

        return self::$instance;
    }
}