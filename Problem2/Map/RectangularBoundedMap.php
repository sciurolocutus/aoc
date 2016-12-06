<?php
namespace Map;

use \Map\BoundedMap as BoundedMap;
use \Turtle\Coordinate as Coordinate;

class RectangularBoundedMap implements BoundedMap {
    protected $contents;
    protected $ul; // upper-left
    protected $lr; // lower-right

    public function __construct($contentArray) {
        $this->contents = $contentArray;
        $this->ul = new Coordinate();
        $this->lr = new Coordinate(count($contentArray)-1, count($contentArray[0])-1);
    }
    
    public function getContents(Coordinate $c) {
        if($this->isInBounds($c)) {
            return $this->contents[$c->getX()][$c->getY()];
        } else {
            return null;
        }
    }
    
    public function isInBounds(Coordinate $c) {
        return $c->getX() >= $this->ul->getX() &&
            $c->getX() <= $this->lr->getX() &&
            $c->getY() >= $this->ul->getY() &&
            $c->getY() <= $this->lr->getY();
    }
}