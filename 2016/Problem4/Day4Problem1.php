<?php

require_once(__DIR__ . '/autoloader.php');

use \Checksum\RoomSpec;

$fcon = file_get_contents(__DIR__ . '/input');
$lines = explode("\n", $fcon);

$sumOfSectorIDs = 0;
foreach($lines as $line) {
    $rs = new RoomSpec($line);
    
    if($rs->validateChecksum()) {
        $sumOfSectorIDs += intval($rs->getSector(), 10);
    }
}
echo $sumOfSectorIDs, "\n";