<?php

require_once(__DIR__ . '/autoloader.php');

use \Checksum\RoomSpec;
use \Cipher\CaesarCipher;

$fcon = file_get_contents(__DIR__ . '/input');
$lines = explode("\n", $fcon);

foreach($lines as $line) {
    $rs = new RoomSpec($line);
    
    if($rs->validateChecksum()) {
        $cc = new CaesarCipher(intval($rs->getSector(), 10));
        echo $cc->encipher($rs->getStrPart()), ':', $rs->getSector(), "\n";
    }
}