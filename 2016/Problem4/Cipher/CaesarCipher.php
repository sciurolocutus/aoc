<?php
namespace Cipher;

class CaesarCipher {
    protected $nRots;

    public function __construct($rots) {
        if(is_int($rots)) {
            $this->nRots = ($rots % 26);
        } else {
            throw new \InvalidArgumentException('Number of rotations must be integer, got: ' . gettype($rots));
        }
    }
    
    public function encipher($str) {
        return self::encipherWord($str, $this->nRots);
    }
    
    public function decipher($str) {
        return self::encipherWord($str, -$this->nRots);
    }
    
    protected static function encipherWord($str, $n) {
        $str = strtoupper($str);
        $enciphered = '';
        foreach(str_split($str) as $letter) {
            if(ord($letter) >= ord('A') && ord($letter) <= ord('Z')) {
                $enciphered .= self::translateChar($letter, $n);
            } else {
                if($letter === '-') {
                    $letter = ' '; //Translate dash to space.
                }
                $enciphered .= $letter; //pass any other non-[A-Z] characters straight through
            }
        }
        return $enciphered;
    }
    
    protected static function translateChar($chr, $offset) {
        $offset = ($offset % 26);
        $min = ord('A');
        $ord = ord($chr);
        
        $distanceFromA = $ord - $min;
        
        if($distanceFromA < 0) {
            $distanceFromA %= 26;
            $distanceFromA += 26;
        }
        
        $target = $distanceFromA + $offset;
        if($target < 0) {
            $target %= 26;
            $target += 26;
        }
        
        $target %= 26;
        
        return chr($target + $min);
    }
}