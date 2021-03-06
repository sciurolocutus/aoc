<?php
namespace Checksum;

class RoomSpec {
    protected $strPart;
    protected $sector;
    protected $checksumPart;
    
    public function __construct($str) {
        $matches = array();
        if(preg_match('/^([a-z-]+)-([0-9]+)\[([a-z]{5})\]/', $str, $matches)) {
            $this->strPart = $matches[1];
            $this->sector = $matches[2];
            $this->checksumPart = $matches[3];
        } else {
            throw new \InvalidArgumentException('Input string ' . $str . ' did not match pattern.');
        }
    }
    
    public function getStrPart() {
        return $this->strPart;
    }
    
    public function getSector() {
        return $this->sector;
    }
    
    public function getChecksum() {
        return $this->checksumPart;
    }
    
    public function calculateChecksum() {
        $reduced = self::findNMostCommonLetters($this->strPart, 5, function($a, $b) {
            if($a['count'] === $b['count']) {
                //echo "$a[letter] and $b[letter] have the same heat-map value of ", $a['count'], "\n";
                return \strcmp($a['letter'], $b['letter']);
            } else {
                //echo "$a[letter] and $b[letter] have different heat-map values.\n";
                return $b['count'] - $a['count'];
            }
        });
        
        $answer = array_reduce($reduced, function($a, $b) {
            return $a . $b['letter'];
        }, '');
        
        return $answer;
    }
    
    public static function findNMostCommonLetters($str, $n=1, $callable=null) {
        $heatMap = array();
        foreach(str_split($str) as $letter) {
            if($letter === '-') {
                continue;
            }
            
            if(isset($heatMap[$letter])) {
                $heatMap[$letter]++;
            } else {
                $heatMap[$letter] = 1;
            }
        }
        
        foreach($heatMap as $key => $value) {
            $hm []= array(
                'letter' => $key,
                'count' => $value
            );
        }
        
        if(isset($callable) && is_callable($callable)) {
            usort($hm, $callable);
        } else {
            usort($hm, function($a, $b) {
                return $b['count'] - $a['count'];
            });
        }
        
        $reduced = array_slice($hm, 0, $n);
        return $reduced;
    }
    
    public function validateChecksum() {
        return $this->calculateChecksum() == $this->checksumPart;
    }
}