<?php
namespace Turtle;

class Coordinate {
    protected $x, $y;

    public function __construct($x=0, $y=0) {
        if(is_int($x) && is_int($y)) {
            $this->x = $x;
            $this->y = $y;
        } else {
            throw new InvalidArgumentException('X and Y must both be integers');
        }
    }
    
    public function getX() {
        return $this->x;
    }
    
    public function getY() {
        return $this->y;
    }
    
    public function getDifference(Coordinate $other) {
        return new Coordinate($this->x - $other->x, $this->y - $other->y);
    }
    
    public function translateBy(Coordinate $other) {
        return new Coordinate($this->x + $other->x, $this->y + $other->y);
    }
    
    public function getEuclideanDistance(Coordinate $other=null) {
        if($other instanceof Coordinate) {
            $src = $this->getDifference($other);
        } else {
            $src = $this;
        }
        return sqrt($src->x*$src->x + $src->y*$src->y);
    }

    public function getCardinalStepdistance(Coordinate $other=null) {
        if($other instanceof Coordinate) {
            $src = $this->getDifference($other);
        } else {
            $src = $this;
        }
        return abs($src->x) + abs($src->y);
    }

    public function __toString() {
        return sprintf("[%d,%d]", $this->x, $this->y);
    }
}
