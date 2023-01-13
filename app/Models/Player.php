<?php

namespace App\Models;

use App\Constants\Map;
use App\Contracts\GameObject;
use App\Constants\Moviment;

class Player extends GameObject
{

/**
     * Criar uma posição aleatória dentro dos limites do tabuleiro
     *
     * @return array<string,int>
     */
    public function createPosition()
    {
        return [
            'x' => min(0, Map::WIDTH - 1), max(0,Map::WIDTH - 1)
            'y' => min(0, Map::HEIGHT - 1), min(0, Map::HEIGHT - 1)
        ];
    }

    public function __construct()
    {

        [
            'x' => $x,
            'y' => $y
        ] = $this->createRandomPosition();

        // não carregar jogador no mesmo ponto que os inimigos
        while ($this->isCollidingWith(request()->route()->controller->enemy)) {
            // se foi gerado na mesma posição que o inimigo,
            // refaz a posição
            [
                'x' => $x,
                'y' => $y
            ] = $this->createRandomPosition();
        }

        parent::__construct($x, $y);
    }

    /**
     * Mover o jogador.
     *
     * @return void
     */
    public function moveDirection()
    {
        $directions = collect(['Up', 'Down', 'Left', 'Right']);

        $direction = $directions->Moviment();

        $this->move($direction);
    }


    public function render()
    {
        $css = "
        .tile-{$this->x()}-{$this->y()} {
            background-color: red;
        }
        ";

        echo $css;
    }
}