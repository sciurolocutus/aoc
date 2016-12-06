<?php

namespace Map;

use \Map\RectangularBoundedMap;
use \Turtle\Coordinate;

class RectangularBoundedMapWithWalls extends RectangularBoundedMap {
        public function isInBounds(Coordinate $c) {
        return $c->getX() >= $this->ul->getX() &&
            $c->getX() <= $this->lr->getX() &&
            $c->getY() >= $this->ul->getY() &&
            $c->getY() <= $this->lr->getY() &&
            $this->contents[$c->getX()][$c->getY()] !== '#'; // # is the "wall" character.
    }
}