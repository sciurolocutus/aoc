<?php
namespace Turtle;

/**
 * Represents a "walk" line segment, from a Coordinate to another Coordinate.
 * It will provide a method for determining whether two WalkSegments intersect,
 *  and if so, where. To do this in a simplified manner, it will assume that
 * all walks are parallel to either the X or Y axis.
 **/
class WalkSegment {
    protected $startCoord;
    protected $endCoord;

    public function __construct($start, $end) {
        if($start instanceof Coordinate && $end instanceof Coordinate)) {
            $this->startCoord = $start;
            $this->endCoord = $end;
        } else {
            throw new \InvalidArgumentException('Both start and end coordinates must be Coordinates');
        }
    }

    public function intersects()
    public static function isValidDirection($d) {
        if(is_string($d) && in_array($d, static::$directions)) {
            return true;
        }
        return false;
    }

    public function rotate($r='R') {
        if(is_string($r) && in_array($r, array('R', 'L'))) {
            if($r === 'R') {
                $this->incrementDirection();
            } else {
                $this->decrementDirection();
            }
        } else {
            throw new InvalidArgumentException('Rotational direction must be R or L; was ' . $r);
        }
    }

    public function incrementDirection() {
        $this->direction = static::$directions[(array_search($this->direction, static::$directions)+1) % count(static::$directions)];
    }

    public function decrementDirection() {
        $this->direction = static::$directions[(array_search($this->direction, static::$directions)+count(static::$directions) - 1) % count(static::$directions)];
    }

    public function __toString() {
        return $this->direction;
    }
}
