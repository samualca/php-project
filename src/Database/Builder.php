<?php

namespace src\Database;

class Builder
{
    private static bool $connected = false;
    private static \PDO $pdo;
    private array $bindings;

    private function __construct()
    {

    }

    private static function connectToDB()
    {
        $config = json_decode(file_get_contents(__DIR__ . '/../../env.json'), true);
        try {
            self::$pdo = new \PDO("{$config['connection']}:host={$config['host']};dbname={$config['database']}", $config['username'], $config['password']);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public static function query()
    {
        if (!self::$connected) {
            self::connectToDB();
        }
        return new static();
    }

    public function raw(string $query, array $bindings)
    {
        self::$pdo->query();
    }

}