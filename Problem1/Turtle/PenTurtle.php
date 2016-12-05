<?php
namespace Turtle;

use Turtle\Turtle as Turtle;

class PenTurtle extends Turtle {
    protected $penFunction;
    
    public function __construct(Callable $pen) {
        parent::__construct();
        $this->penFunction = $pen;
    }
    
    /**
     * Specialization of the basic Turtle's movement
     * Instead of simply "jumping" to the end, proceed stepwise
     * and call the injected penFunction at each step, with the current coordinate.
     */
    public function move($n) {

        $matrix = array(
            'N' => array(0, 1),
            'E' => array(1, 0),
            'S' => array(0, -1),
            'W' => array(-1, 0)
        );


        $xMovementCoefficient = $matrix[$this->direction->__toString()][0];
        $yMovementCoefficient = $matrix[$this->direction->__toString()][1];
        $xMovement = $xMovementCoefficient * $n;
        $yMovement = $yMovementCoefficient * $n;
        
        $x = $this->getX();
        $y = $this->getY();
        
        $xDestination = $x + $xMovement;
        $yDestination = $y + $yMovement;
        
        //echo "$x,$y moving to $xDestination, $yDestination in steps of ($xMovementCoefficient, $yMovementCoefficient)\n";
        
        //until done, proceed one step closer
        while($x != $xDestination || $y != ($yDestination)) {
            $x += $xMovementCoefficient;
            $y += $yMovementCoefficient;
            //echo "Calling penFunction(new Coordinate($x, $y))\n";
            call_user_func($this->penFunction, new Coordinate($x, $y)); //After each step, call the penFunction
        }


        $this->coord = $this->coord->translateBy(new Coordinate($xMovement, $yMovement));
    }
}