<?php

namespace Shape;

class TriangleSpec {
    protected $a, $b, $c;
    
    public function __construct($a, $b, $c) {
        $sorted = array($a, $b, $c);
        sort($sorted);
        list($this->a, $this->b, $this->c) = $sorted;
    }
    
    public function isValid() {
        return $this->c < ($this->a + $this->b);
    }
    
    public function __toString() {
        return sprintf("[%d,%d,%d]", $this->a, $this->b, $this->c);
    }
}