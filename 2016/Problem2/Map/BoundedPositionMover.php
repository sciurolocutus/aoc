<?php

namespace Map;

use \Turtle\Coordinate as Coordinate;
use \Map\BoundedMap as BoundedMap;

/*
 * An object of this class has a current position and obeys a BoundedMap (RectangularBoundedMap) to tell it whether it can make a move or not.
 * Under a successive sequence of movements within a given BoundedMap, you can ask it where it is!
 */
class BoundedPositionMover {
    protected $coord;
    protected $map;
    
    public function __construct($map, $coord=null) {
        require_once(__DIR__ . '/BoundedMap.php');
        if($map instanceof \Map\BoundedMap) {
            $this->map = $map;
        } else {
            throw new \InvalidArgumentException('Map must be an instance of a BoundedMap, was ' . get_class($map));
        }
        if($coord instanceof \Turtle\Coordinate) {
            $this->coord = $coord;
        } else {
            $this->coord = new Coordinate();
        }
    }
    
    public function moveBy(Coordinate $vector) {
        $dest = $this->coord->translateBy($vector);
        if($this->map->isInBounds($dest)) {
            $this->coord = $dest;
            return true;
        }
        return false;
    }
    
    public function getCoordinates() {
        return $this->coord;
    }
    
    public function getContents() {
        return $this->map->getContents($this->coord);
    }
}