<?php

namespace src;

use PDO;
use PDOException;

class Database
{

    const DB_HOST = "";
    const DB_PORT = "";
    const DB_NAME = "";
    const DB_USER = "";
    const DB_PASS = "";
    private PDO $connection;


    public function __construct()
    {
        try{
            $this->connection = new PDO('pgsql:host='.self::DB_HOST.';port='.self::DB_PORT.';dbname='.self::DB_NAME,self::DB_USER, self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Database Connection error ".$e->getMessage();
            exit;
        }
    }

    public function getAllTeamPlayers(int $teamId): array{

        $stmt = $this->connection->prepare("SELECT * FROM player WHERE teamid = :id");
        $stmt->execute(['id'=>$teamId]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }


    public function getAllTeams():array
    {
        $stmt = $this->connection->prepare("SELECT * FROM team");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }



}