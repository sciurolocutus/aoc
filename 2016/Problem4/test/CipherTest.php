<?php
namespace Cipher;

require_once(dirname(__DIR__) . '/autoloader.php');

use \Cipher\CaesarCipher;
use \Checksum\RoomSpec;

$specList = array(
    'aaaaa-bbb-z-y-x-123[abxyz]',
    'a-b-c-d-e-f-g-h-987[abcde]',
    'not-a-real-room-404[oarel]',
    'totally-real-room-200[decoy]',
    'qzmt-zixmtkozy-ivhz-343[fkjek]'
);

foreach($specList as $spec) {
    $rs = new RoomSpec($spec);
    $stringPart = $rs->getStrPart();
    $cc = new CaesarCipher(intval($rs->getSector(), 10));
    echo join(':', array($stringPart, $cc->encipher($stringPart), $cc->decipher($stringPart))), "\n";
}

$cc = new CaesarCipher(4);
echo $cc->encipher('hello'), "\n";
echo $cc->decipher('lipps'), "\n";

foreach(array('word', 'two words', 'Three fish blue.') as $word) {
    echo join(':', array($cc->encipher($word), $cc->decipher($word), $cc->encipher($cc->decipher($word)))), "\n";
}