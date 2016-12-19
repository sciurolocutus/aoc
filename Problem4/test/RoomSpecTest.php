<?php
namespace Checksum;

require_once(dirname(__DIR__) . '/autoloader.php');

use \Checksum\RoomSpec;

$specList = array(
    'aaaaa-bbb-z-y-x-123[abxyz]',
    'a-b-c-d-e-f-g-h-987[abcde]',
    'not-a-real-room-404[oarel]',
    'totally-real-room-200[decoy]'
);

foreach($specList as $spec) {
    $rs = new RoomSpec($spec);
    
    // echo "String part: ", $rs->getStrPart(), "\n";
    // echo "Given checksum: ", $rs->getChecksum(), "\n";
    // echo "Sector: ", $rs->getSector(), "\n";
    
    // echo "Calculated checksum: ", $rs->calculateChecksum(), "\n";
    echo "Does it match? ", $rs->validateChecksum()?"YES":"NO", "\n";
}