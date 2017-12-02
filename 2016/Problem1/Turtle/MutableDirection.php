<?php
namespace Turtle;

class MutableDirection {
    protected $direction;

    public static $directions = array('N', 'E', 'S', 'W');

    public function __construct($direction='N') {
        if(static::isValidDirection($direction)) {
            $this->direction = $direction;
        } else {
            throw new InvalidArgumentException('Direction must be N, E, S, or W; was ' . $direction);
        }
    }

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
