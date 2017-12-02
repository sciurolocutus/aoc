<?php
namespace Turtle;

use \Turtle\MutableDirection as MutableDirection;
use \Turtle\Coordinate as Coordinate;

class Turtle {
    protected $coord;
    protected $direction;

    public function __construct() {
        $this->coord = new Coordinate();
        $this->direction = new MutableDirection('N');
    }

    public function getX() { return $this->coord->getX(); }
    public function getY() { return $this->coord->getY(); }
    public function getCoordinate() { return $this->coord; }

    public function getEuclideanDistance() {
        return $this->coord->getEuclideanDistance(null);
    }

    public function getCardinalStepdistance() {
        return $this->coord->getCardinalStepdistance(null);
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

        $this->coord = $this->coord->translateBy(new Coordinate($xMovement, $yMovement));
    }

    public function takeAction($actionString) {
        $matches = array();
        if(is_string($actionString) && preg_match('/^([LR])(\d+)()$/', $actionString, $matches)) {
            $rotation = $matches[1];
            $n = intval($matches[2], 10);

            $this->turn($rotation);
            $this->move($n);
        } else {
            throw new \InvalidArgumentException('the action must be numeric followed by L or R');
        }

    }
    
    public function __toString() {
        return sprintf("[%d, %d] (%s)", $this->getX(), $this->getY(), $this->direction->__toString());
    }
}
