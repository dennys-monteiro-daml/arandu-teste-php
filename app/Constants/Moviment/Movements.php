<?php

namespace App\Constants;

define("UP", "ArrowUp");
define("LEFT", "ArrowLeft");
define("RIGHT", "ArrowRight");
define("DOWN", "ArrowDown");

require_once __DIR__ . '/App/Constants/Movement/Movements.php';


class Moviment
{
  public function move($direction)
  {
      switch ($direction) {
          case 'UP':
              $this->_y--;
              break;

          case 'Down':
              $this->_y++;
              break;

          case 'Left':
              $this->_x--;
              break;

          case 'Right':
              $this->_x++;
              break;

          default:
              # code...
              break;
      }
  }
}