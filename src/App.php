<?php

namespace src;

final class App
{
    private Database $database;
    public function __construct()
    {
        $this->database = new Database();
        $this->mainView();
    }

    private function mainView(): void
    {
        $teams = [];
        foreach ($this->database->getAllTeams() as $team){
            $players = [];
            foreach ($this->database->getAllTeamPlayers($team['id']) as $player){
                $player['accounts'] = isset($player['accounts']) ? json_decode($player['accounts'],true) : null;
                $players[] = $player;
            }
            $team['players'] = $players;
            $team['stats'] = isset($player['stats']) ?  json_decode($team['stats'],true):null;
            $teams[] = $team;
        }
        $this->loadView('home.php', ['teams'=>$teams]);
    }

    private function loadView(string $view, array $data = []): void
    {
        $path = ROOT . 'views' . DIRECTORY_SEPARATOR . $view;

        if (file_exists($path)) {
            extract($data);
            include $path;
        } else {
            echo 'ERROR! FILE DO NOT Exist!';
        }
    }

}