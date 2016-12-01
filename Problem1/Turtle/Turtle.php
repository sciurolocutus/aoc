<?php
namespace Turtle;

use \Turtle\MutableDirection as MutableDirection;

class Turtle {
    protected $x, $y;
    protected $direction;

    public function __construct() {
        $this->x = 0;
        $this->y = 0;
        $this->direction = new Mutabledirection('N');
    }

    public function getX() { return $this->x; }
    public function getY() { return $this->y; }

    public function getEuclideanDistance() {
        return sqrt($this->x*$this->x + $this->y*$this->y);
    }

    public function getCardinalStepdistance() {
        return abs($this->x) + abs($this->y);
    }

    public function turn($direction) {
        $this->direction->rotate($direction);
    }
    
    public function move($n) {

        $matrix = array(
            'N' => array(0, 1),
            'E' => array(1, 0),
            'S' => array(0, -1),
            'W' => array(-1, 0)
        );

        $xMovement = $matrix[$this->direction->__toString()][0] * $n;
        $yMovement = $matrix[$this->direction->__toString()][1] * $n;

        $this->x += $xMovement;
        $this->y += $yMovement;
    }

    public function takeAction($actionString) {
        $matches = array();
        if(is_string($actionString) && preg_match('/^([LR])(\d+)()$/', $actionString, $matches)) {
            $rotation = $matches[1];
            $n = intval($matches[2], 10);

            $this->turn($rotation);
            $this->move($n);
        } else {
            throw new InvalidArgumentException('the action must be numeric followed by L or R');
        }

    }
    
    public function __toString() {
        return sprintf("[%d, %d] (%s)", $this->getX(), $this->getY(), $this->direction->__toString());
    }
}
