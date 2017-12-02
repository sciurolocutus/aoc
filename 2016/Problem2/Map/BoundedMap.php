<?php

namespace Map;

use \Turtle\Coordinate as Coordinate;

interface BoundedMap {
    public function getContents(Coordinate $c);
    public function isInBounds(Coordinate $c);
}